<?php

namespace App\Containers\AccRecurringTransaction\UI\API\Transformers;

use App\Containers\AccRecurringTransaction\Models\AccRecurringTransaction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccRecurringCategory\UI\API\Transformers\AccRecurringCategoryTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccPayslipEarning\UI\API\Transformers\AccPayslipEarningTransformer;
use App\Containers\AccPayslipDeduction\UI\API\Transformers\AccPayslipDeductionTransformer;
use App\Containers\AccPayslipContribution\UI\API\Transformers\AccPayslipContributionTransformer;


class AccRecurringTransactionTransformer extends Transformer
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
'user',
'footer',
'category',
'employee',
'paid_from_bank_account',
'received_in_bank_account',
'currency',
'customer',
'supplier',
'earnings',
'deductions',
'contributions',

    ];

    /**
     * @param AccRecurringTransaction $entity
     *
     * @return array
     */
    public function transform(AccRecurringTransaction $entity)
    {
        $response = [
            'object' => 'AccRecurringTransaction',
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

    	public function includeItems( AccRecurringTransaction $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeUser( AccRecurringTransaction $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeFooter( AccRecurringTransaction $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeCategory( AccRecurringTransaction $item ) {
		return $this->item( $item->category, new AccRecurringCategoryTransformer() );
	}

	public function includeEmployee( AccRecurringTransaction $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includePaidFromBankAccount( AccRecurringTransaction $item ) {
		return $this->item( $item->paid_from_bank_account, new AccBankAccountTransformer() );
	}

	public function includeReceivedInBankAccount( AccRecurringTransaction $item ) {
		return $this->item( $item->received_in_bank_account, new AccBankAccountTransformer() );
	}

	public function includeCurrency( AccRecurringTransaction $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeCustomer( AccRecurringTransaction $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSupplier( AccRecurringTransaction $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includeEarnings( AccRecurringTransaction $item ) {
		return $this->collection( $item->earnings, new AccPayslipEarningTransformer() );
	}

	public function includeDeductions( AccRecurringTransaction $item ) {
		return $this->collection( $item->deductions, new AccPayslipDeductionTransformer() );
	}

	public function includeContributions( AccRecurringTransaction $item ) {
		return $this->collection( $item->contributions, new AccPayslipContributionTransformer() );
	}


}
