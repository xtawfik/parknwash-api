<?php

namespace App\Containers\Category\UI\API\Transformers;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class CategoryTransformer extends Transformer
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
        'countries',

    ];

    /**
     * @param Category $entity
     *
     * @return array
     */
    public function transform(Category $entity)
    {
        $response = [
            'object' => 'Category',
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

    	public function includeCountries( Category $item ) {
		return $this->collection( $item->countries, new CountryTransformer() );
	}


}
