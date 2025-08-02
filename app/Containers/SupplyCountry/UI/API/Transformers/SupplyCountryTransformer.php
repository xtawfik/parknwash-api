<?php

namespace App\Containers\SupplyCountry\UI\API\Transformers;

use App\Containers\SupplyCountry\Models\SupplyCountry;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;


class SupplyCountryTransformer extends Transformer
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
'supply',

    ];

    /**
     * @param SupplyCountry $entity
     *
     * @return array
     */
    public function transform(SupplyCountry $entity)
    {
        $response = [
            'object' => 'SupplyCountry',
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

    	public function includeCountry( SupplyCountry $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeSupply( SupplyCountry $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}


}
