<?php

namespace App\Containers\AccInventoryWriteOff\UI\API\Transformers;

use App\Containers\AccInventoryWriteOff\Models\AccInventoryWriteOff;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItemStore\UI\API\Transformers\AccItemStoreTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccProject\UI\API\Transformers\AccProjectTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;


class AccInventoryWriteOffTransformer extends Transformer
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
        'item_stores',
'inventory',
'balance_sheet_account',
'profit_loss_account',
'division',
'place',
'division_place',
'project',
'user',
'tax_code',

    ];

    /**
     * @param AccInventoryWriteOff $entity
     *
     * @return array
     */
    public function transform(AccInventoryWriteOff $entity)
    {
        $response = [
            'object' => 'AccInventoryWriteOff',
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

    	public function includeItemStores( AccInventoryWriteOff $item ) {
		return $this->collection( $item->item_stores, new AccItemStoreTransformer() );
	}

	public function includeInventory( AccInventoryWriteOff $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeBalanceSheetAccount( AccInventoryWriteOff $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includeProfitLossAccount( AccInventoryWriteOff $item ) {
		return $this->item( $item->profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeDivision( AccInventoryWriteOff $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccInventoryWriteOff $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccInventoryWriteOff $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeProject( AccInventoryWriteOff $item ) {
		return $this->item( $item->project, new AccProjectTransformer() );
	}

	public function includeUser( AccInventoryWriteOff $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeTaxCode( AccInventoryWriteOff $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}


}
