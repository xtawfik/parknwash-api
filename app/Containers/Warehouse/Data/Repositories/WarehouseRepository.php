<?php

namespace App\Containers\Warehouse\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class WarehouseRepository
 */
class WarehouseRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'supply_id' => '=',
'total_quantity' => 'like',
'out_quantity' => 'like',
'damaged_quantity' => 'like',

    ];

}
