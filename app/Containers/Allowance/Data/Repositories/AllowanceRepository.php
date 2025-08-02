<?php

namespace App\Containers\Allowance\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AllowanceRepository
 */
class AllowanceRepository extends Repository
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
