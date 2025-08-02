<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Criterias\Criteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class FilterCriteria.
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class FilterCriteria extends Criteria
{

  /**
   * @var Request
   */
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  /**
   * @param $model
   * @param PrettusRepositoryInterface $repository
   *
   * @return mixed
   */
  public function apply($model, PrettusRepositoryInterface $repository)
  {
    $request = $this->request;
    if ($request->filtering) {
      $filters = $request->filtering;
      if (is_array($filters)) {
        foreach ($filters as $filter) {
          $filter = json_decode($filter);
          $filterType = $filter->filter;
          $value = $filter->value;
          $key = $filter->key;

          // Relation filter
          if (strstr($key, "include,")) {
            $parts = explode(",", $key);
            $key = $parts[1];
            $field = $parts[2];

            if ($field) {
              $model = $model->whereHas($key, function ($query) use ($field, $value, $filterType) {
                switch ($filterType) {
                  case "=":
                    if (is_array($value)) {
                      $query->whereIn($field, $value);
                    } else {
                      $query->where($field, $value);
                    }
                    break;
                  case "like":
                    $query->where($field, 'like', "%$value%");
                    break;
                  case "range":
                    $compare = '>=';
                    if (strstr($field, "_to")) {
                      $compare = '<=';
                    }

                    $query->where(str_replace(["_from", "_to"], "", $field), $compare, $value);
                    break;
                }
              });
            }
          } // Normal filter
          else {
            switch ($filterType) {
              case "=":
                if (is_array($value)) {
                  $model = $model->whereIn($key, $value);
                } else {
                  $model = $model->where($key, $value);
                }
                break;
              case "like":
                $model = $model->where($key, 'like', "%$value%");
                break;
              case "range":
                $compare = '>=';
                if (strstr($key, "_to")) {
                  $compare = '<=';
                }

                $model = $model->where(str_replace(["_from", "_to"], "", $key), $compare, $value);
                break;
            }
          }
        }
      }
    }

    // AG Grid filters
    if ($request->has('filters')) {
      $filters = $request->filters; // Assuming $request->filters is already decoded associative array
      // Define the fields that require day or month name filtering
      $dateFields = ['created_at']; // Add more fields here as needed

      foreach ($filters as $filterGroup) {
        // Check if filterGroup is an array of conditions
        if (is_string($filterGroup)) {
          $filterGroup = json_decode($filterGroup, true);
        }
        $field = $filterGroup['field'];
        $operator = $filterGroup['operator'] ?? 'AND'; // Default operator to AND if not specified
        $filterType = $filterGroup['filterType'];

        // Special case for set filter ex. {"field":"mall_id","filterType":"set","values":[5,34]}
        if ($filterType === 'set') {
          // Handle relation fields with dot notation
          if (strpos($field, '.') !== false) {
            $parts = explode('.', $field);
            $relation = $parts[0];
            $relationField = $parts[1];
            
            $values = $filterGroup['values'] ?? [];
            if (empty($values)) {
              // Handle the case for "Blanks" filter
              $model = $model->whereHas($relation, function($q) use ($relationField) {
                $q->whereNull($relationField);
              });
            } else {
              $model = $model->whereHas($relation, function($q) use ($relationField, $values) {
                $q->whereIn($relationField, $values);
              });
            }
            continue;
          }

          // Check if the field is created_at or requires day/month name filtering
          if (in_array($field, ['created_at', 'join_date', 'residence_end', 'passport_end_date', 'entrance_date']) or Str::contains($field, "_xdate")) { // Add more fields as needed
            $field = str_replace("_xdate", "", $field);
            $values = $filterGroup['values'] ?? [];
            $model = $this->applyDayMonthNameFilter($model, $field, $values, $operator);
          } else {
            if (isset($filterGroup['values']) && is_array($filterGroup['values'])) {
              $values = $filterGroup['values'];
              if (empty($values)) {
                // Handle the case for "Blanks" filter
                $model = $model->whereNull($field);
              } else {
                if (Str::contains($field, "_xdays_in_date")) {
                  $field = str_replace("_xdays_in_date", "", $field);
                  $model = $this->filterDaysInDate($model, $values, $field);
                } else if (Str::contains($field, "_xyears_in_date")) {
                  $field = str_replace("_xyears_in_date", "", $field);
                  $model = $this->filterYearsInDate($model, $values, $field);
                } else {
                  $model = $model->whereIn($field, $values);
                }
              }
            }
          }
          continue;
        }

        if ($operator === 'AND') {
          foreach ($filterGroup['conditions'] as $condition) {
            // Apply conditions with AND logic
            $model = $this->applyFilterBasedOnType($model, $field, $condition, 'and', $filterType);
          }
        } elseif ($operator === 'OR') {
          // Apply all OR conditions within a single orWhere clause to ensure correct logical grouping
          $model = $model->where(function ($query) use ($filterType, $field, $filterGroup) {
            foreach ($filterGroup['conditions'] as $condition) {
              $this->applyFilterBasedOnType($query, $field, $condition, 'or', $filterType);
            }
          });
        }
      }
    }

    return $model;
  }

  protected function filterYearsInDate($model, $values, $field)
  {
    $model = $model->where(function ($query) use ($values, $field) {
      foreach ($values as $value) {
        $operation = explode("_", $value)[0];  // Extract the operation (e.g., 'lte', 'gte', 'lt', etc.)
        $years = explode("_", $value);  // Extract the years values (e.g., '1', '2', '5')

        switch ($operation) {
          case 'lte':
            // lte: less than or equal to 'X' years difference from now
            $query->orWhereRaw("YEAR(CURDATE()) - YEAR($field) <= ?", [$years[1]]);
            break;

          case 'gte':
            // gte: greater than or equal to 'X' years difference from now
            $query->orWhereRaw("YEAR(CURDATE()) - YEAR($field) >= ?", [$years[1]]);
            break;

          case 'lt':
            // lt: less than 'X' years difference from now
            $query->orWhereRaw("YEAR(CURDATE()) - YEAR($field) < ?", [$years[1]]);
            break;

          case 'gt':
            // gt: greater than 'X' years difference from now
            $query->orWhereRaw("YEAR(CURDATE()) - YEAR($field) > ?", [$years[1]]);
            break;

          case 'ltebt':
            // ltebt: less than or equal to 'Y' years and greater than or equal to 'X' years difference from now
            $fromYears = $years[1];
            $toYears = $years[2];
            $query->orWhereRaw(
              "(YEAR(CURDATE()) - YEAR($field) <= ? AND YEAR(CURDATE()) - YEAR($field) >= ?)",
              [$toYears, $fromYears]
            );
            break;

          case 'gtebt':
            // gtebt: greater than or equal to 'X' years and less than or equal to 'Y' years difference from now
            $fromYears = $years[1];
            $toYears = $years[2];
            $query->orWhereRaw(
              "(YEAR(CURDATE()) - YEAR($field) >= ? AND YEAR(CURDATE()) - YEAR($field) <= ?)",
              [$fromYears, $toYears]
            );
            break;

          case 'ltbt':
            // ltbt: less than 'X' years but more than 'Y' years difference from now
            $fromYears = $years[1];
            $toYears = $years[2];
            $query->orWhereRaw(
              "(YEAR(CURDATE()) - YEAR($field) < ? AND YEAR(CURDATE()) - YEAR($field) > ?)",
              [$toYears, $fromYears]
            );
            break;

          case 'gtbt':
            // gtbt: greater than 'X' years and less than 'Y' years difference from now
            $fromYears = $years[1];
            $toYears = $years[2];
            $query->orWhereRaw(
              "(YEAR(CURDATE()) - YEAR($field) > ? AND YEAR(CURDATE()) - YEAR($field) < ?)",
              [$fromYears, $toYears]
            );
            break;
        }
      }
    });

    return $model;
  }

  protected function filterDaysInDate($model, $values, $field)
  {
    $model = $model->where(function ($query) use ($values, $field) {
      foreach ($values as $value) {
        $operation = explode("_", $value)[0];  // Extract the operation (e.g., 'lte', 'gte', 'lt', etc.)
        $days = explode("_", $value);  // Extract the days values (e.g., '0', '1', '30')

        switch ($operation) {
          case 'lte':
            // lte: less than or equal to 'X' days from now
            $query->orWhereRaw("DATE($field) <= DATE_SUB(NOW(), INTERVAL ? DAY)", [$days[1]]);
            break;

          case 'gte':
            // gte: greater than or equal to 'X' days from now
            $query->orWhereRaw("DATE($field) >= DATE_ADD(NOW(), INTERVAL ? DAY)", [$days[1]]);
            break;

          case 'lt':
            // lt: less than 'X' days from now
            $query->orWhereRaw("DATE($field) < DATE_SUB(NOW(), INTERVAL ? DAY)", [$days[1]]);
            break;

          case 'gt':
            // gt: greater than 'X' days from now
            $query->orWhereRaw("DATE($field) > DATE_SUB(NOW(), INTERVAL ? DAY)", [$days[1]]);
            break;

          case 'ltebt':
            // ltebt: less than or equal to 'Y' days and greater than or equal to 'X' days
            $fromDays = $days[1];
            $toDays = $days[2];
            $query->orWhereRaw("DATE($field) <= DATE_SUB(NOW(), INTERVAL ? DAY) AND DATE($field) >= DATE_SUB(NOW(), INTERVAL ? DAY)", [$toDays, $fromDays]);
            break;

          case 'gtebt':
            // gtebt: greater than or equal to 'X' days and less than or equal to 'Y' days
            $fromDays = $days[1];
            $toDays = $days[2];
            $query->orWhereRaw("DATE($field) >= DATE_ADD(NOW(), INTERVAL ? DAY) AND DATE($field) <= DATE_ADD(NOW(), INTERVAL ? DAY)", [$fromDays, $toDays]);
            break;

          case 'ltbt':
            // ltbt: less than 'X' days but more than 'Y' days
            $fromDays = $days[1];
            $toDays = $days[2];
            $query->orWhereRaw("DATE($field) < DATE_SUB(NOW(), INTERVAL ? DAY) AND DATE($field) > DATE_SUB(NOW(), INTERVAL ? DAY)", [$toDays, $fromDays]);
            break;

          case 'gtbt':
            // gtbt: greater than 'X' days and less than 'Y' days
            $fromDays = $days[1];
            $toDays = $days[2];
            $query->orWhereRaw("DATE($field) > DATE_ADD(NOW(), INTERVAL ? DAY) AND DATE($field) < DATE_ADD(NOW(), INTERVAL ? DAY)", [$fromDays, $toDays]);
            break;
        }
      }
    });

    return $model;
  }

  protected function applyFilterBasedOnType(&$query, $field, $condition, $boolean = 'and', $filterType = 'text')
  {
    $method = $boolean === 'and' ? 'where' : 'orWhere';

    $operatorMap = [
      'equals' => '=',
      'notEqual' => '!=',
      'greaterThan' => '>',
      'greaterThanOrEqual' => '>=',
      'lessThan' => '<',
      'lessThanOrEqual' => '<='
    ];

    // Handle relation fields with dot notation
    if (strpos($field, '.') !== false) {
      $parts = explode('.', $field);
      $relation = $parts[0];
      $relationField = $parts[1];
      
      $query = $query->whereHas($relation, function($q) use ($relationField, $condition, $filterType, $operatorMap) {
        if ($condition['type'] === 'blank') {
          $q->whereNull($relationField);
          return;
        }

        if ($condition['type'] === 'notBlank') {
          $q->whereNotNull($relationField);
          return;
        }

        if ($filterType === 'number' || $filterType === 'text') {
          $filter = $condition['filter'];
          if (isset($operatorMap[$condition['type']])) {
            $q->where($relationField, $operatorMap[$condition['type']], $filter);
          }

          if ($condition['type'] === 'inRange') {
            if ($filterType === 'number') {
              $q->where($relationField, '>=', $filter)
                ->where($relationField, '<=', $condition['filterTo']);
            }
          }

          if ($filterType === 'text') {
            if ($condition['type'] === 'contains')
              $q->where($relationField, 'LIKE', "%{$filter}%");

            if ($condition['type'] === 'notContains')
              $q->where($relationField, 'NOT LIKE', "%{$filter}%");

            if ($condition['type'] === 'startsWith')
              $q->where($relationField, 'LIKE', "{$filter}%");

            if ($condition['type'] === 'endsWith')
              $q->where($relationField, 'LIKE', "%{$filter}");
          }
        } elseif ($filterType === 'date') {
          $date = $condition['dateFrom'];
          if (isset($operatorMap[$condition['type']]))
            $q->whereDate($relationField, $operatorMap[$condition['type']], $date);

          if ($condition['type'] === 'inRange')
            $q->whereBetween($relationField, [$date, $condition['dateTo']]);
        }
      });
      return $query;
    }

    // Original code for non-relation fields
    if ($condition['type'] === 'blank') {
      $query = $query->whereNull($field);
      return $query;
    }

    if ($condition['type'] === 'notBlank') {
      $query = $query->whereNotNull($field);
      return $query;
    }

    if ($filterType === 'number' || $filterType === 'text') {
      $filter = $condition['filter'];
      // Special RX logic for car_number with distinct car_id
      if (in_array($condition['type'], ['equals', 'contains']) && $field === 'car_number' && $filter === 'RX') {
        $query = $query->whereIn('car_number', function($sub) use ($query) {
          $sub->select('car_number')
            ->from($query->getModel()->getTable())
            ->groupBy('car_number')
            ->havingRaw('COUNT(DISTINCT car_id) > 1');
        });
        // Add ordering by car_number and car_id
        $query = $query->orderBy('car_number')->orderBy('car_id');
        return $query;
      }
      if (isset($operatorMap[$condition['type']])) {
        if (Str::contains($field, "_xdays_in_date")) {
          $field = str_replace("_xdays_in_date", "", $field);
          $operator = $operatorMap[$condition['type']];
          $query = $query->$method(function($q) use ($field, $operator, $filter) {
            if ($operator === '=') {
              $q->whereRaw("IF(TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)) >= 0, TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)), TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field))) = ?", [$filter]);
            } else {
              $q->whereRaw("IF(TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)) >= 0, TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)), TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field))) $operator ?", [$filter]);
            }
          });
        } else {
          $query = $query->$method($field, $operatorMap[$condition['type']], $filter);
        }
      }

      if ($condition['type'] === 'inRange') {
        if (Str::contains($field, "_xdays_in_date")) {
          $field = str_replace("_xdays_in_date", "", $field);
          $query = $query->$method(function($q) use ($field, $filter, $condition) {
            $q->whereRaw("IF(TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)) >= 0, TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)), TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field))) >= ?", [$filter])
              ->whereRaw("IF(TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)) >= 0, TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field)), TIMESTAMPDIFF(DAY, DATE(NOW()), DATE($field))) <= ?", [$condition['filterTo']]);
          });
        } else if ($filterType === 'number') {
          $query = $query->$method($field, '>=', $filter);
          $query = $query->$method($field, '<=', $condition['filterTo']);
        }
      }

      if ($filterType === 'text') {
        if ($condition['type'] === 'contains')
          $query = $query->$method($field, 'LIKE', "%{$filter}%");

        if ($condition['type'] === 'notContains')
          $query = $query->$method($field, 'NOT LIKE', "%{$filter}%");

        if ($condition['type'] === 'startsWith')
          $query = $query->$method($field, 'LIKE', "{$filter}%");

        if ($condition['type'] === 'endsWith')
          $query = $query->$method($field, 'LIKE', "%{$filter}");
      }

    } elseif ($filterType === 'date') {
      $method = $boolean === 'and' ? 'whereDate' : 'orWhereDate';
      $date = $condition['dateFrom'];
      if (isset($operatorMap[$condition['type']]))
        $query = $query->$method($field, $operatorMap[$condition['type']], $date);

      if ($condition['type'] === 'inRange')
        $query = $query->whereBetween($field, [$date, $condition['dateTo']]);
    }

    return $query;
  }

  /**
   * Apply day or month name or year filter to the query.
   *
   * @param $query
   * @param string $field
   * @param array $values
   * @param string $boolean
   * @return mixed
   */
  protected function applyDayMonthNameFilter(&$query, $field, $values, $boolean = 'and')
  {
    $daysOfWeek = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
    $years = range(2017, date('Y') + 10);

    $values = array_map('strtolower', $values);

    // Determine the method to use based on the boolean value
    $method = 'where';

    // Apply filtering for days of the week
    $days = array_intersect($values, $daysOfWeek);
    if (!empty($days)) {
      $query = $query->$method(function ($q) use ($days, $field) {
        foreach ($days as $day) {
          $q->orWhereRaw("DAYNAME($field) = ?", [ucfirst($day)]);
        }
      });
    }

    // Apply filtering for months
    $monthsFilter = array_intersect($values, $months);
    if (!empty($monthsFilter)) {
      $query = $query->$method(function ($q) use ($monthsFilter, $field) {
        foreach ($monthsFilter as $month) {
          $q->orWhereMonth($field, [$month]);
        }
      });
    }

    // Apply filtering for years
    $yearsFilter = array_intersect($values, $years);
    if (!empty($yearsFilter)) {
      $query = $query->$method(function ($q) use ($yearsFilter, $field) {
        foreach ($yearsFilter as $year) {
          $q->orWhereYear($field, $year);
        }
      });
    }

    return $query;
  }

}
