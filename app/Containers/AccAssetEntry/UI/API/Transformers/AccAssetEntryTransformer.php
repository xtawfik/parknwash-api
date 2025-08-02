<?php

namespace App\Containers\AccAssetEntry\UI\API\Transformers;

use App\Containers\AccAssetEntry\Models\AccAssetEntry;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccAssetEntryItem\UI\API\Transformers\AccAssetEntryItemTransformer;
use App\Containers\AccFixedAsset\UI\API\Transformers\AccFixedAssetTransformer;
use App\Containers\AccIntangibleAsset\UI\API\Transformers\AccIntangibleAssetTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;


class AccAssetEntryTransformer extends Transformer
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
        'user',
'items',
'fixed_assets',
'intangible_assets',
'division_places',

    ];

    /**
     * @param AccAssetEntry $entity
     *
     * @return array
     */
    public function transform(AccAssetEntry $entity)
    {
        $response = [
            'object' => 'AccAssetEntry',
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

    	public function includeUser( AccAssetEntry $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeItems( AccAssetEntry $item ) {
		return $this->collection( $item->items, new AccAssetEntryItemTransformer() );
	}

	public function includeFixedAssets( AccAssetEntry $item ) {
		return $this->collection( $item->fixed_assets, new AccFixedAssetTransformer() );
	}

	public function includeIntangibleAssets( AccAssetEntry $item ) {
		return $this->collection( $item->intangible_assets, new AccIntangibleAssetTransformer() );
	}

	public function includeDivisionPlaces( AccAssetEntry $item ) {
		return $this->collection( $item->division_places, new AccDivisionPlaceTransformer() );
	}


}
