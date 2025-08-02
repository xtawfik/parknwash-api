<?php

namespace App\Containers\AccItemStore\UI\API\Transformers;

use App\Containers\AccItemStore\Models\AccItemStore;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccInventoryTransfer\UI\API\Transformers\AccInventoryTransferTransformer;
use App\Containers\AccInventoryWriteOff\UI\API\Transformers\AccInventoryWriteOffTransformer;
use App\Containers\AccProductionOrder\UI\API\Transformers\AccProductionOrderTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccItemStoreTransformer extends Transformer
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
        'inventory_item',
'inventory',
'inventory_transfer',
'inventory_write_off',
'production_order',
'user',

    ];

    /**
     * @param AccItemStore $entity
     *
     * @return array
     */
    public function transform(AccItemStore $entity)
    {
        $response = [
            'object' => 'AccItemStore',
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

    	public function includeInventoryItem( AccItemStore $item ) {
		return $this->item( $item->inventory_item, new AccInventoryItemTransformer() );
	}

	public function includeInventory( AccItemStore $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeInventoryTransfer( AccItemStore $item ) {
		return $this->item( $item->inventory_transfer, new AccInventoryTransferTransformer() );
	}

	public function includeInventoryWriteOff( AccItemStore $item ) {
		return $this->item( $item->inventory_write_off, new AccInventoryWriteOffTransformer() );
	}

	public function includeProductionOrder( AccItemStore $item ) {
		return $this->item( $item->production_order, new AccProductionOrderTransformer() );
	}

	public function includeUser( AccItemStore $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
