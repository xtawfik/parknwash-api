<?php

namespace App\Containers\EmployeeDeduction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EmployeeDeductionRepository
 */
class EmployeeDeductionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'type_id' => '=',
'employee_id' => '=',
'amount' => 'like',
'calculation_method' => '=',

    ];

}
