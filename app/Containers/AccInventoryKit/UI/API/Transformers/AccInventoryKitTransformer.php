<?php

namespace App\Containers\AccInventoryKit\UI\API\Transformers;

use App\Containers\AccInventoryKit\Models\AccInventoryKit;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItemStore\UI\API\Transformers\AccItemStoreTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;


class AccInventoryKitTransformer extends Transformer
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
        'items',
'division',
'place',
'division_place',
'user',
'sales_division_place',
'sales_place',
'sales_division',
'tax_code',
'income_account',

    ];

    /**
     * @param AccInventoryKit $entity
     *
     * @return array
     */
    public function transform(AccInventoryKit $entity)
    {
        $response = [
            'object' => 'AccInventoryKit',
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

    	public function includeItems( AccInventoryKit $item ) {
		return $this->collection( $item->items, new AccItemStoreTransformer() );
	}

	public function includeDivision( AccInventoryKit $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccInventoryKit $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccInventoryKit $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeUser( AccInventoryKit $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeSalesDivisionPlace( AccInventoryKit $item ) {
		return $this->item( $item->sales_division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeSalesPlace( AccInventoryKit $item ) {
		return $this->item( $item->sales_place, new AccPlaceTransformer() );
	}

	public function includeSalesDivision( AccInventoryKit $item ) {
		return $this->item( $item->sales_division, new AccDivisionTransformer() );
	}

	public function includeTaxCode( AccInventoryKit $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}

	public function includeIncomeAccount( AccInventoryKit $item ) {
		return $this->item( $item->income_account, new AccProfitLossAccountTransformer() );
	}


}
