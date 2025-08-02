<?php

namespace App\Containers\ProductOption\UI\API\Transformers;

use App\Containers\ProductOption\Models\ProductOption;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Product\UI\API\Transformers\ProductTransformer;
use App\Containers\OptionCategory\UI\API\Transformers\OptionCategoryTransformer;
use App\Containers\Option\UI\API\Transformers\OptionTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class ProductOptionTransformer extends Transformer
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
        'product',
'option_category',
'option',
'country',

    ];

    /**
     * @param ProductOption $entity
     *
     * @return array
     */
    public function transform(ProductOption $entity)
    {
        $response = [
            'object' => 'ProductOption',
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

    	public function includeProduct( ProductOption $item ) {
		return $this->item( $item->product, new ProductTransformer() );
	}

	public function includeOptionCategory( ProductOption $item ) {
		return $this->item( $item->option_category, new OptionCategoryTransformer() );
	}

	public function includeOption( ProductOption $item ) {
		return $this->item( $item->option, new OptionTransformer() );
	}

	public function includeCountry( ProductOption $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
