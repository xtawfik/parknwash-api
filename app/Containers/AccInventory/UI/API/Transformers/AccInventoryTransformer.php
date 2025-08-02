<?php

namespace App\Containers\AccInventory\UI\API\Transformers;

use App\Containers\AccInventory\Models\AccInventory;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;


class AccInventoryTransformer extends Transformer
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
'inventory_items',

    ];

    /**
     * @param AccInventory $entity
     *
     * @return array
     */
    public function transform(AccInventory $entity)
    {
        $response = [
            'object' => 'AccInventory',
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

    	public function includeUser( AccInventory $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeInventoryItems( AccInventory $item ) {
		return $this->collection( $item->inventory_items, new AccInventoryItemTransformer() );
	}


}
