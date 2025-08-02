<?php

namespace App\Containers\AccInventoryTransfer\UI\API\Transformers;

use App\Containers\AccInventoryTransfer\Models\AccInventoryTransfer;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;
use App\Containers\AccItemStore\UI\API\Transformers\AccItemStoreTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccInventoryTransferTransformer extends Transformer
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
        'inventory_items',
'item_stores',
'from_inventory',
'to_inventory',
'user',

    ];

    /**
     * @param AccInventoryTransfer $entity
     *
     * @return array
     */
    public function transform(AccInventoryTransfer $entity)
    {
        $response = [
            'object' => 'AccInventoryTransfer',
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

    	public function includeInventoryItems( AccInventoryTransfer $item ) {
		return $this->collection( $item->inventory_items, new AccInventoryItemTransformer() );
	}

	public function includeItemStores( AccInventoryTransfer $item ) {
		return $this->collection( $item->item_stores, new AccItemStoreTransformer() );
	}

	public function includeFromInventory( AccInventoryTransfer $item ) {
		return $this->item( $item->from_inventory, new AccInventoryTransformer() );
	}

	public function includeToInventory( AccInventoryTransfer $item ) {
		return $this->item( $item->to_inventory, new AccInventoryTransformer() );
	}

	public function includeUser( AccInventoryTransfer $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
