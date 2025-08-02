<?php

namespace App\Containers\Area\UI\API\Transformers;

use App\Containers\Area\Models\Area;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class AreaTransformer extends Transformer
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
        'malls',
'country',

    ];

    /**
     * @param Area $entity
     *
     * @return array
     */
    public function transform(Area $entity)
    {
        $response = [
            'object' => 'Area',
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

    	public function includeMalls( Area $item ) {
		return $this->collection( $item->malls, new MallTransformer() );
	}

	public function includeCountry( Area $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
