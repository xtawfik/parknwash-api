<?php

namespace App\Containers\Partner\UI\API\Transformers;

use App\Containers\Partner\Models\Partner;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class PartnerTransformer extends Transformer
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

    ];

    /**
     * @param Partner $entity
     *
     * @return array
     */
    public function transform(Partner $entity)
    {
        $response = [
            'object' => 'Partner',
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

    	public function includeMall( Partner $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeCountry( Partner $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
