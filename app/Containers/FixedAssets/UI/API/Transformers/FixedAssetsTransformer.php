<?php

namespace App\Containers\FixedAssets\UI\API\Transformers;

use App\Containers\FixedAssets\Models\FixedAssets;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AssetCategory\UI\API\Transformers\AssetCategoryTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class FixedAssetsTransformer extends Transformer
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
        'category',
'country',
'mall',

    ];

    /**
     * @param FixedAssets $entity
     *
     * @return array
     */
    public function transform(FixedAssets $entity)
    {
        $response = [
            'object' => 'FixedAssets',
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

    	public function includeCategory( FixedAssets $item ) {
		return $this->item( $item->category, new AssetCategoryTransformer() );
	}

	public function includeCountry( FixedAssets $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( FixedAssets $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}


}
