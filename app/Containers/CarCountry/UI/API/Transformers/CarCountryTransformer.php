<?php

namespace App\Containers\CarCountry\UI\API\Transformers;

use App\Containers\CarCountry\Models\CarCountry;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Car\UI\API\Transformers\CarTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class CarCountryTransformer extends Transformer
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
        'car',
'country',

    ];

    /**
     * @param CarCountry $entity
     *
     * @return array
     */
    public function transform(CarCountry $entity)
    {
        $response = [
            'object' => 'CarCountry',
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

    	public function includeCar( CarCountry $item ) {
		return $this->item( $item->car, new CarTransformer() );
	}

	public function includeCountry( CarCountry $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
