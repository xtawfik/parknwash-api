<?php

namespace App\Containers\DamageRequest\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DamageRequestRepository
 */
class DamageRequestRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'mall_id' => '=',
'supply_id' => '=',
'quantity' => 'like',
'user_id' => '=',

    ];

}
