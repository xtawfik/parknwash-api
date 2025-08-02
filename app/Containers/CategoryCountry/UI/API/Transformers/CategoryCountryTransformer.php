<?php

namespace App\Containers\CategoryCountry\UI\API\Transformers;

use App\Containers\CategoryCountry\Models\CategoryCountry;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Category\UI\API\Transformers\CategoryTransformer;


class CategoryCountryTransformer extends Transformer
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
'category',

    ];

    /**
     * @param CategoryCountry $entity
     *
     * @return array
     */
    public function transform(CategoryCountry $entity)
    {
        $response = [
            'object' => 'CategoryCountry',
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

    	public function includeCountry( CategoryCountry $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeCategory( CategoryCountry $item ) {
		return $this->item( $item->category, new CategoryTransformer() );
	}


}
