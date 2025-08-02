<?php

namespace App\Containers\PayrollEmployee\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PayrollEmployeeRepository
 */
class PayrollEmployeeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'payroll_id' => '=',
'main_salary' => 'like',
'allowances' => 'like',
'deductions' => 'like',
'bonus' => 'like',
'total' => 'like',

    ];

}
