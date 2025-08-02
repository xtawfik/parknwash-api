<?php

namespace App\Containers\MallSupply\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MallSupplyRepository
 */
class MallSupplyRepository extends Repository
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
