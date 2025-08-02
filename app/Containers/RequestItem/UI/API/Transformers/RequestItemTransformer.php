<?php

namespace App\Containers\RequestItem\UI\API\Transformers;

use App\Containers\RequestItem\Models\RequestItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Request\UI\API\Transformers\RequestTransformer;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;


class RequestItemTransformer extends Transformer
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
        'request',
'supply',

    ];

    /**
     * @param RequestItem $entity
     *
     * @return array
     */
    public function transform(RequestItem $entity)
    {
        $response = [
            'object' => 'RequestItem',
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

    	public function includeRequest( RequestItem $item ) {
		return $this->item( $item->request, new RequestTransformer() );
	}

	public function includeSupply( RequestItem $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}


}
