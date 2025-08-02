<?php

namespace App\Containers\AccPayment\UI\API\Transformers;

use App\Containers\AccPayment\Models\AccPayment;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\AccPurchaseInvoice\UI\API\Transformers\AccPurchaseInvoiceTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;


class AccPaymentTransformer extends Transformer
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
'customer',
'supplier',
'accounts',
'items',
'footer',
'bank_account',
'purchase_invoice',
'inventory',

    ];

    /**
     * @param AccPayment $entity
     *
     * @return array
     */
    public function transform(AccPayment $entity)
    {
        $response = [
            'object' => 'AccPayment',
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

    	public function includeUser( AccPayment $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCustomer( AccPayment $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSupplier( AccPayment $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includeAccounts( AccPayment $item ) {
		return $this->collection( $item->accounts, new AccProfitLossAccountTransformer() );
	}

	public function includeItems( AccPayment $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeFooter( AccPayment $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeBankAccount( AccPayment $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}

	public function includePurchaseInvoice( AccPayment $item ) {
		return $this->item( $item->purchase_invoice, new AccPurchaseInvoiceTransformer() );
	}

	public function includeInventory( AccPayment $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}


}
