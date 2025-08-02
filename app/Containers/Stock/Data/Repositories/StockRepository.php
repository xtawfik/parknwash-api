<?php

namespace App\Containers\Stock\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class StockRepository
 */
class StockRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'supply_id' => '=',
'quantity' => 'like',
'damaged' => 'like',
'user_id' => '=',
'country_id' => '=',

    ];

}
