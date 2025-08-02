<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Carbon\Carbon;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class YearFilterCriteria
 *
 * @author  Mohamed Tawfik  <contact@mohamedtawfik.me>
 */
class YearFilterCriteria extends Criteria
{

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return  mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        $year = request()->get('year', null);
        $month = request()->get('month', null);

        $field = "date";

        if ($year && $month) {
            $date = Carbon::createFromDate($year, $month, 1);
            $model = $model->whereYear($field, $date->year)->whereMonth($field, $date->month);
        } elseif ($year) {
            $model = $model->whereYear($field, $year);
        }

        return $model;
    }

}
