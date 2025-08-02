<?php

namespace App\Containers\StockIn\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class StockInRepository
 */
class StockInRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'supply_id' => '=',
'quantity' => 'like',
'user_id' => '=',

    ];

}
