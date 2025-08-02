<?php

namespace App\Containers\EmployeeCost\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EmployeeCostRepository
 */
class EmployeeCostRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'employee_id' => '=',

    ];

}
