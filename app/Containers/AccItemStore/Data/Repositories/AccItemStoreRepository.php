<?php

namespace App\Containers\AccItemStore\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccItemStoreRepository
 */
class AccItemStoreRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'inventory_item_id' => '=',
'quantity' => 'like',
'inventory_id' => '=',
'inventory_transfer_id' => '=',
'inventory_write_off_id' => '=',
'production_order_id' => '=',
'user_id' => '=',
'average_cost' => 'like',
'description' => 'like',
'inventory_kit_id' => '=',

    ];

}
