<?php

namespace App\Containers\AccInventoryItemAmount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInventoryItemAmountRepository
 */
class AccInventoryItemAmountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'inventory_item_id' => '=',
'quantity' => 'like',
'inventory_id' => '=',
'description' => 'like',
'user_id' => '=',

    ];

}
