<?php

namespace App\Containers\HandOver\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class HandOverRepository
 */
class HandOverRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'employee_id' => '=',
'supervisor_id' => '=',
'amount' => 'like',
'status' => '=',
'mall_id' => '=',
'country_id' => '=',
'confirmed_at' => '=',

    ];

}
