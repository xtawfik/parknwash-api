<?php

namespace App\Containers\AccInventoryItemAmount\UI\API\Transformers;

use App\Containers\AccInventoryItemAmount\Models\AccInventoryItemAmount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;


class AccInventoryItemAmountTransformer extends Transformer
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
        'user',
'inventory',
'inventory_item',

    ];

    /**
     * @param AccInventoryItemAmount $entity
     *
     * @return array
     */
    public function transform(AccInventoryItemAmount $entity)
    {
        $response = [
            'object' => 'AccInventoryItemAmount',
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

    	public function includeUser( AccInventoryItemAmount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeInventory( AccInventoryItemAmount $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeInventoryItem( AccInventoryItemAmount $item ) {
		return $this->item( $item->inventory_item, new AccInventoryItemTransformer() );
	}


}
