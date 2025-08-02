<?php

namespace App\Containers\PaymentMethod\UI\API\Transformers;

use App\Containers\PaymentMethod\Models\PaymentMethod;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class PaymentMethodTransformer extends Transformer
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
        'country',

    ];

    /**
     * @param PaymentMethod $entity
     *
     * @return array
     */
    public function transform(PaymentMethod $entity)
    {
        $response = [
            'object' => 'PaymentMethod',
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

    	public function includeCountry( PaymentMethod $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
