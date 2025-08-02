<?php

namespace App\Containers\CoverPrice\UI\API\Transformers;

use App\Containers\CoverPrice\Models\CoverPrice;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Service\UI\API\Transformers\ServiceTransformer;
use App\Containers\Cover\UI\API\Transformers\CoverTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class CoverPriceTransformer extends Transformer
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
        'service',
'cover',
'country',

    ];

    /**
     * @param CoverPrice $entity
     *
     * @return array
     */
    public function transform(CoverPrice $entity)
    {
        $response = [
            'object' => 'CoverPrice',
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

    	public function includeService( CoverPrice $item ) {
		return $this->item( $item->service, new ServiceTransformer() );
	}

	public function includeCover( CoverPrice $item ) {
		return $this->item( $item->cover, new CoverTransformer() );
	}

	public function includeCountry( CoverPrice $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
