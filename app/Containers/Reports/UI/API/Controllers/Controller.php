<?php

namespace App\Containers\Reports\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Ship\Parents\Controllers\ApiController;
use App\Containers\Reports\Export\DownloadExport;

/**
 * Class Controller
 *
 * @package App\Containers\Reports\UI\API\Controllers
 */
class Controller extends ApiController
{

  public function getAllReports(Request $request)
  {
    $data = $request->all();
    $model = Str::studly($data['endpoint']);

    $columns = explode(";", $request->summary);
    $summary = [];

    foreach ($columns as $column) {
      // Fetch repository using Apiato, dynamically referencing the model's report task
      $repository = Apiato::call("Reports@{$model}ReportTask", [], ['addRequestCriteria']);

      // Ensure the repository has criteria applied (FilterCriteria, RequestCriteria, YearFilterCriteria)
      $repository->pushCriteria(app(\App\Ship\Criterias\Eloquent\FilterCriteria::class));
      $repository->pushCriteria(app(\App\Ship\Criterias\Eloquent\YearFilterCriteria::class));
      $repository->pushCriteria(app(\Prettus\Repository\Criteria\RequestCriteria::class));

      $sumData = explode(":", $column);
      $col = $sumData[0];
      $type = $sumData[1];

      if (Str::contains($type, '|')) {
        $advancedData = explode("|", $type);
        $field = $advancedData[0];
        $value = $advancedData[1];
        $operation = $advancedData[2];

        $filterResult = $this->applyCondition($repository, $field, $value);

        if ($operation === 'sum') {
          $result = $filterResult->sum($col);
          $count = $filterResult->count();
          $summary[] = [
            "column" => $col,
            "formula" => $operation,
            "value" => $result,
            "count" => $count,
            "field" => $type,
            "debug" => [
              'column' => $col,
              'operation' => $operation,
              'result' => $result,
              'count' => $count,
              'sql' => $filterResult->toSql(),
              'bindings' => $filterResult->getBindings()
            ]
          ];
        } elseif ($operation === 'count') {
          $result = $filterResult->count();
          $summary[] = [
            "column" => $col,
            "formula" => $operation,
            "value" => $result,
            "count" => $result,
            "field" => $type
          ];
        } elseif ($operation === 'sum_count') {
          $total = $repository->count();
          $resultSum = $filterResult->sum($col);
          $resultCount = $filterResult->count();
          $percentage = $total > 0 ? ($resultCount / $total) * 100 : 0;
          $summary[] = [
            "column" => $col,
            "formula" => $operation,
            "value" => $resultSum,
            "count" => $resultCount,
            "field" => $type,
            "percentage" => $percentage
          ];
        }
      } else {
        switch ($type) {
          case "sum":
            $result = $repository->sum($col);
            $count = $repository->count();
            $summary[] = [
              "column" => $col,
              "formula" => "sum",
              "value" => $result,
              "count" => $count
            ];
            break;
          case "count":
            $result = $repository->count();
            $summary[] = [
              "column" => $col,
              "formula" => "count",
              "value" => $result,
              "count" => $result
            ];
            break;
          case "sum_count":
            $resultSum = $repository->sum($col);
            $resultCount = $repository->count();
            $summary[] = [
              "column" => $col,
              "formula" => "sum_count",
              "value" => $resultSum,
              "count" => $resultCount
            ];
            break;
        }
      }
    }

    return response()->json($summary);
  }

  /**
   * Applies a condition to the repository based on field and value.
   *
   * @param $repository
   * @param string $field
   * @param string $value
   * @return mixed
   */
  protected function applyCondition($repository, string $field, string $value)
  {
    if ($value === 'not_null') {
      return $repository->whereNotNull($field);
    }

    if ($value === 'is_null') {
      return $repository->whereNull($field);
    }

    if (Str::startsWith($value, 'gte:')) {
      $threshold = explode(':', $value)[1];
      return $repository->where($field, '>=', $threshold);
    }

    if (Str::startsWith($value, 'lte:')) {
      $threshold = explode(':', $value)[1];
      return $repository->where($field, '<=', $threshold);
    }

    if (Str::startsWith($value, 'gt:')) {
      $threshold = explode(':', $value)[1];
      return $repository->where($field, '>', $threshold);
    }

    if (Str::startsWith($value, 'lt:')) {
      $threshold = explode(':', $value)[1];
      return $repository->where($field, '<', $threshold);
    }

    // check if has one of the filterDaysInDate operations
    if (Str::contains($value, ['lte', 'gte', 'lt', 'gt', 'ltebt', 'gtebt', 'ltbt', 'gtbt']) && Str::contains($field, '_xdays_in_date')) {
      $field = str_replace("_xdays_in_date", "", $field);
      return $this->filterDaysInDate($repository, explode(",", $value), $field);
    }

    // Default case: match exact value
    return $repository->where($field, $value);
  }

  protected function filterDaysInDate($model, $values, $field)
  {
    return $model->where(function ($query) use ($values, $field) {
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
  }

  /**
   * Export data to an Excel file.
   *
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
   */
  public function exportExcel()
  {
    $download = (new DownloadExport());

    return $download->download('Exported_Data.xlsx');
  }
}
