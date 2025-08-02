<?php

namespace App\Containers\AccIntangibleAsset\UI\API\Transformers;

use App\Containers\AccIntangibleAsset\Models\AccIntangibleAsset;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccAssetEntry\UI\API\Transformers\AccAssetEntryTransformer;


class AccIntangibleAssetTransformer extends Transformer
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
'control_account_amortization',
'profit_loss_account',
'disposal_account',
'entries',

    ];

    /**
     * @param AccIntangibleAsset $entity
     *
     * @return array
     */
    public function transform(AccIntangibleAsset $entity)
    {
        $response = [
            'object' => 'AccIntangibleAsset',
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

    	public function includeUser( AccIntangibleAsset $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeDivision( AccIntangibleAsset $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccIntangibleAsset $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccIntangibleAsset $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeControlAccountCost( AccIntangibleAsset $item ) {
		return $this->item( $item->control_account_cost, new AccControlAccountTransformer() );
	}

	public function includeControlAccountAmortization( AccIntangibleAsset $item ) {
		return $this->item( $item->control_account_amortization, new AccControlAccountTransformer() );
	}

	public function includeProfitLossAccount( AccIntangibleAsset $item ) {
		return $this->item( $item->profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeDisposalAccount( AccIntangibleAsset $item ) {
		return $this->item( $item->disposal_account, new AccProfitLossAccountTransformer() );
	}

	public function includeEntries( AccIntangibleAsset $item ) {
		return $this->collection( $item->entries, new AccAssetEntryTransformer() );
	}


}
