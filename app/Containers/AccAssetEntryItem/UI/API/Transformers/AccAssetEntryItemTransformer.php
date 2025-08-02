<?php

namespace App\Containers\AccAssetEntryItem\UI\API\Transformers;

use App\Containers\AccAssetEntryItem\Models\AccAssetEntryItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccFixedAsset\UI\API\Transformers\AccFixedAssetTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccAssetEntry\UI\API\Transformers\AccAssetEntryTransformer;
use App\Containers\AccIntangibleAsset\UI\API\Transformers\AccIntangibleAssetTransformer;


class AccAssetEntryItemTransformer extends Transformer
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
'fixed_asset',
'division',
'place',
'division_place',
'depreciation_entry',
'amortization_entry',
'intangible_asset',

    ];

    /**
     * @param AccAssetEntryItem $entity
     *
     * @return array
     */
    public function transform(AccAssetEntryItem $entity)
    {
        $response = [
            'object' => 'AccAssetEntryItem',
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

    	public function includeUser( AccAssetEntryItem $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeFixedAsset( AccAssetEntryItem $item ) {
		return $this->item( $item->fixed_asset, new AccFixedAssetTransformer() );
	}

	public function includeDivision( AccAssetEntryItem $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccAssetEntryItem $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccAssetEntryItem $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeDepreciationEntry( AccAssetEntryItem $item ) {
		return $this->item( $item->depreciation_entry, new AccAssetEntryTransformer() );
	}

	public function includeAmortizationEntry( AccAssetEntryItem $item ) {
		return $this->item( $item->amortization_entry, new AccAssetEntryTransformer() );
	}

	public function includeIntangibleAsset( AccAssetEntryItem $item ) {
		return $this->item( $item->intangible_asset, new AccIntangibleAssetTransformer() );
	}


}
