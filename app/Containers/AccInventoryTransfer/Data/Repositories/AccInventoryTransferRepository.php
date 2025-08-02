<?php

namespace App\Containers\AccInventoryTransfer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInventoryTransferRepository
 */
class AccInventoryTransferRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'reference' => 'like',
'from_inventory_id' => '=',
'to_inventory_id' => '=',
'description' => 'like',
'total' => 'like',
'quantity' => 'like',
'user_id' => '=',

    ];

}
