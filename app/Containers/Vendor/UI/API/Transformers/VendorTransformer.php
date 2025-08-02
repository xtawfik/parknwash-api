<?php

namespace App\Containers\Vendor\UI\API\Transformers;

use App\Containers\Vendor\Models\Vendor;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\City\UI\API\Transformers\CityTransformer;


class VendorTransformer extends Transformer
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
        'mall',
'country',
'city',

    ];

    /**
     * @param Vendor $entity
     *
     * @return array
     */
    public function transform(Vendor $entity)
    {
        $response = [
            'object' => 'Vendor',
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

    	public function includeMall( Vendor $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeCountry( Vendor $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeCity( Vendor $item ) {
		return $this->item( $item->city, new CityTransformer() );
	}


}
