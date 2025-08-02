<?php

namespace App\Containers\ClientOrder\UI\API\Transformers;

use App\Containers\ClientOrder\Models\ClientOrder;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\OrderProduct\UI\API\Transformers\OrderProductTransformer;


class ClientOrderTransformer extends Transformer
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
'country',
'products',

    ];

    /**
     * @param ClientOrder $entity
     *
     * @return array
     */
    public function transform(ClientOrder $entity)
    {
        $response = [
            'object' => 'ClientOrder',
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

    	public function includeUser( ClientOrder $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCountry( ClientOrder $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeProducts( ClientOrder $item ) {
		return $this->collection( $item->products, new OrderProductTransformer() );
	}


}
