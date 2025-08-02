<?php

namespace App\Containers\Country\UI\API\Transformers;

use App\Containers\Country\Models\Country;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class CountryTransformer extends Transformer
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

    ];

    /**
     * @param Country $entity
     *
     * @return array
     */
    public function transform(Country $entity)
    {
        $response = [
            'object' => 'Country',
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

    	public function includeMalls( Country $item ) {
		return $this->collection( $item->malls, new MallTransformer() );
	}


}
