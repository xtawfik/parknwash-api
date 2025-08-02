<?php

namespace App\Containers\AccCurrencyRevaluationaItem\UI\API\Transformers;

use App\Containers\AccCurrencyRevaluationaItem\Models\AccCurrencyRevaluationaItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCurrencyRevaluation\UI\API\Transformers\AccCurrencyRevaluationTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;
use App\Containers\AccSpecialAccount\UI\API\Transformers\AccSpecialAccountTransformer;


class AccCurrencyRevaluationaItemTransformer extends Transformer
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
'currency_revaluation',
'profit_loss_account',
'balance_sheet_account',
'control_account',
'bank_account',
'customer',
'employee',
'supplier',
'capital_account',
'special_account',

    ];

    /**
     * @param AccCurrencyRevaluationaItem $entity
     *
     * @return array
     */
    public function transform(AccCurrencyRevaluationaItem $entity)
    {
        $response = [
            'object' => 'AccCurrencyRevaluationaItem',
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

    	public function includeUser( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCurrencyRevaluation( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->currency_revaluation, new AccCurrencyRevaluationTransformer() );
	}

	public function includeProfitLossAccount( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeBalanceSheetAccount( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includeControlAccount( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeBankAccount( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}

	public function includeCustomer( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeEmployee( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeSupplier( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includeCapitalAccount( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->capital_account, new AccCapitalAccountTransformer() );
	}

	public function includeSpecialAccount( AccCurrencyRevaluationaItem $item ) {
		return $this->item( $item->special_account, new AccSpecialAccountTransformer() );
	}


}
