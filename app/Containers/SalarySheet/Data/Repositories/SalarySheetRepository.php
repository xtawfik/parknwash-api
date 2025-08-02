<?php

namespace App\Containers\SalarySheet\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SalarySheetRepository
 */
class SalarySheetRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'employee_id' => '=',
'monthly_days' => 'like',
'working_days' => 'like',
'total_sales' => 'like',
'per_day' => 'like',
'basic_salary' => 'like',
'commission' => 'like',
'previous_due' => 'like',
'tips' => 'like',
'incentive' => 'like',
'housing' => 'like',
'transport' => 'like',
'medical' => 'like',
'bonus' => 'like',
'mobile' => 'like',
'food' => 'like',
'travelling' => 'like',
'gross_salary' => 'like',
'housing_d' => 'like',
'transport_d' => 'like',
'mobile_d' => 'like',
'loan' => 'like',
'absent' => 'like',
'advance' => 'like',
'sick_leave' => 'like',
'penalty' => 'like',
'total_deductions' => 'like',
'net_salary' => 'like',
'paid_salary' => '=',
'relay' => 'like',
'paid_way' => '=',
'paid_date' => '=',
'branch' => 'like',
'month' => 'like',
'year' => 'like',
'mall_id' => '=',

    ];

}
