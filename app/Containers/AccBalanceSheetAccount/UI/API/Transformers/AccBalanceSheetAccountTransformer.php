<?php

namespace App\Containers\AccBalanceSheetAccount\UI\API\Transformers;

use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Containers\AccCashFlowType\UI\API\Transformers\AccCashFlowTypeTransformer;
use App\Containers\AccCashFlow\UI\API\Transformers\AccCashFlowTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;


class AccBalanceSheetAccountTransformer extends Transformer
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
'balance_sheet',
'cash_flow_type',
'cash_flow',
'division',
'place',
'division_place',
'account_category',
'tax_code',

    ];

    /**
     * @param AccBalanceSheetAccount $entity
     *
     * @return array
     */
    public function transform(AccBalanceSheetAccount $entity)
    {
        $response = [
            'object' => 'AccBalanceSheetAccount',
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

    	public function includeUser( AccBalanceSheetAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBalanceSheet( AccBalanceSheetAccount $item ) {
		return $this->item( $item->balance_sheet, new AccBalanceSheetTransformer() );
	}

	public function includeCashFlowType( AccBalanceSheetAccount $item ) {
		return $this->item( $item->cash_flow_type, new AccCashFlowTypeTransformer() );
	}

	public function includeCashFlow( AccBalanceSheetAccount $item ) {
		return $this->item( $item->cash_flow, new AccCashFlowTransformer() );
	}

	public function includeDivision( AccBalanceSheetAccount $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccBalanceSheetAccount $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccBalanceSheetAccount $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeAccountCategory( AccBalanceSheetAccount $item ) {
		return $this->item( $item->account_category, new AccAccountCategoryTransformer() );
	}

	public function includeTaxCode( AccBalanceSheetAccount $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}


}
