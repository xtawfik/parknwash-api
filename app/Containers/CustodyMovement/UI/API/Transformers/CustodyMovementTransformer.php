<?php

namespace App\Containers\CustodyMovement\UI\API\Transformers;

use App\Containers\CustodyMovement\Models\CustodyMovement;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Custody\UI\API\Transformers\CustodyTransformer;


class CustodyMovementTransformer extends Transformer
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
        'custody',

    ];

    /**
     * @param CustodyMovement $entity
     *
     * @return array
     */
    public function transform(CustodyMovement $entity)
    {
        $response = [
            'object' => 'CustodyMovement',
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

    	public function includeCustody( CustodyMovement $item ) {
		return $this->item( $item->custody, new CustodyTransformer() );
	}


}
