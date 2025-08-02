<?php

namespace App\Containers\AccNonInventoryItem\UI\API\Transformers;

use App\Containers\AccNonInventoryItem\Models\AccNonInventoryItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;


class AccNonInventoryItemTransformer extends Transformer
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
'sold_balance_sheet_account',
'purchased_balance_sheet_account',
'purchased_profit_loss_account',
'sold_profit_loss_account',
'tax_code',
'division_place',
'place_id',
'division',

    ];

    /**
     * @param AccNonInventoryItem $entity
     *
     * @return array
     */
    public function transform(AccNonInventoryItem $entity)
    {
        $response = [
            'object' => 'AccNonInventoryItem',
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

    	public function includeUser( AccNonInventoryItem $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeSoldBalanceSheetAccount( AccNonInventoryItem $item ) {
		return $this->item( $item->sold_balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includePurchasedBalanceSheetAccount( AccNonInventoryItem $item ) {
		return $this->item( $item->purchased_balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includePurchasedProfitLossAccount( AccNonInventoryItem $item ) {
		return $this->item( $item->purchased_profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeSoldProfitLossAccount( AccNonInventoryItem $item ) {
		return $this->item( $item->sold_profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeTaxCode( AccNonInventoryItem $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}

	public function includeDivisionPlace( AccNonInventoryItem $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includePlaceId( AccNonInventoryItem $item ) {
		return $this->item( $item->place_id, new AccPlaceTransformer() );
	}

	public function includeDivision( AccNonInventoryItem $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}


}
