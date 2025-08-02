<?php

namespace App\Containers\OrderCover\UI\API\Transformers;

use App\Containers\OrderCover\Models\OrderCover;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Order\UI\API\Transformers\OrderTransformer;
use App\Containers\Cover\UI\API\Transformers\CoverTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class OrderCoverTransformer extends Transformer
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
        'order',
'cover',
'country',

    ];

    /**
     * @param OrderCover $entity
     *
     * @return array
     */
    public function transform(OrderCover $entity)
    {
        $response = [
            'object' => 'OrderCover',
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

    	public function includeOrder( OrderCover $item ) {
		return $this->item( $item->order, new OrderTransformer() );
	}

	public function includeCover( OrderCover $item ) {
		return $this->item( $item->cover, new CoverTransformer() );
	}

	public function includeCountry( OrderCover $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
