<?php

namespace App\Containers\AccFixedAsset\UI\API\Transformers;

use App\Containers\AccFixedAsset\Models\AccFixedAsset;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccAssetEntry\UI\API\Transformers\AccAssetEntryTransformer;


class AccFixedAssetTransformer extends Transformer
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
'division',
'place',
'division_place',
'control_account_cost',
'control_acount_depreciation',
'profit_loss_account',
'disposal_account',
'entries',

    ];

    /**
     * @param AccFixedAsset $entity
     *
     * @return array
     */
    public function transform(AccFixedAsset $entity)
    {
        $response = [
            'object' => 'AccFixedAsset',
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

    	public function includeUser( AccFixedAsset $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeDivision( AccFixedAsset $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccFixedAsset $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccFixedAsset $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeControlAccountCost( AccFixedAsset $item ) {
		return $this->item( $item->control_account_cost, new AccControlAccountTransformer() );
	}

	public function includeControlAcountDepreciation( AccFixedAsset $item ) {
		return $this->item( $item->control_acount_depreciation, new AccControlAccountTransformer() );
	}

	public function includeProfitLossAccount( AccFixedAsset $item ) {
		return $this->item( $item->profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeDisposalAccount( AccFixedAsset $item ) {
		return $this->item( $item->disposal_account, new AccProfitLossAccountTransformer() );
	}

	public function includeEntries( AccFixedAsset $item ) {
		return $this->collection( $item->entries, new AccAssetEntryTransformer() );
	}


}
