<?php

namespace App\Containers\AccProductionOrder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccProductionOrderRepository
 */
class AccProductionOrderRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'reference' => 'like',
'description' => 'like',
'inventory_id' => '=',
'finished_item_id' => '=',
'quantity' => 'like',
'status' => '=',
'production_cost' => 'like',
'total' => 'like',
'user_id' => '=',

    ];

}
