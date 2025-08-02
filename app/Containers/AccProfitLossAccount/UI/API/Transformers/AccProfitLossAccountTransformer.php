<?php

namespace App\Containers\AccProfitLossAccount\UI\API\Transformers;

use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccProfitLoss\UI\API\Transformers\AccProfitLossTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCashFlow\UI\API\Transformers\AccCashFlowTransformer;
use App\Containers\AccCashFlowType\UI\API\Transformers\AccCashFlowTypeTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;


class AccProfitLossAccountTransformer extends Transformer
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
        'profit_loss',
'user',
'cash_flow',
'cash_flow_type',
'division_place',
'place',
'division',
'account_category',
'tax_code',

    ];

    /**
     * @param AccProfitLossAccount $entity
     *
     * @return array
     */
    public function transform(AccProfitLossAccount $entity)
    {
        $response = [
            'object' => 'AccProfitLossAccount',
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

    	public function includeProfitLoss( AccProfitLossAccount $item ) {
		return $this->item( $item->profit_loss, new AccProfitLossTransformer() );
	}

	public function includeUser( AccProfitLossAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCashFlow( AccProfitLossAccount $item ) {
		return $this->item( $item->cash_flow, new AccCashFlowTransformer() );
	}

	public function includeCashFlowType( AccProfitLossAccount $item ) {
		return $this->item( $item->cash_flow_type, new AccCashFlowTypeTransformer() );
	}

	public function includeDivisionPlace( AccProfitLossAccount $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includePlace( AccProfitLossAccount $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivision( AccProfitLossAccount $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeAccountCategory( AccProfitLossAccount $item ) {
		return $this->item( $item->account_category, new AccAccountCategoryTransformer() );
	}

	public function includeTaxCode( AccProfitLossAccount $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}


}
