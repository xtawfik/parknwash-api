<?php

namespace App\Containers\AccProductionOrder\UI\API\Transformers;

use App\Containers\AccProductionOrder\Models\AccProductionOrder;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;
use App\Containers\AccItemStore\UI\API\Transformers\AccItemStoreTransformer;
use App\Containers\AccProductionCost\UI\API\Transformers\AccProductionCostTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccProductionOrderTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'inventory',
'finished_item',
'item_stores',
'accounts',
'user',

    ];

    /**
     * @param AccProductionOrder $entity
     *
     * @return array
     */
    public function transform(AccProductionOrder $entity)
    {
        $response = [
            'object' => 'AccProductionOrder',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        // Get values of fillables
        $response = $this->fillables( $entity, $response );

        $response = $this->withMedia( $entity, $response, "image" );
        $response = $this->withMedia( $entity, $response, "gallery" );
        $response = $this->withMedia( $entity, $response, "file" );

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    	public function includeInventory( AccProductionOrder $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeFinishedItem( AccProductionOrder $item ) {
		return $this->item( $item->finished_item, new AccInventoryItemTransformer() );
	}

	public function includeItemStores( AccProductionOrder $item ) {
		return $this->collection( $item->item_stores, new AccItemStoreTransformer() );
	}

	public function includeAccounts( AccProductionOrder $item ) {
		return $this->collection( $item->accounts, new AccProductionCostTransformer() );
	}

	public function includeUser( AccProductionOrder $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
