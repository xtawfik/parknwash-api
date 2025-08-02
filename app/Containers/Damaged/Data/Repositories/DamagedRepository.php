<?php

namespace App\Containers\Damaged\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DamagedRepository
 */
class DamagedRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'country_id' => '=',
'mall_id' => '=',
'supply_id' => '=',
'quantity' => 'like',

    ];

}
