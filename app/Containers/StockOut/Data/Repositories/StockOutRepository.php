<?php

namespace App\Containers\StockOut\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class StockOutRepository
 */
class StockOutRepository extends Repository
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
'received_at' => '=',
'status' => '=',

    ];

}
