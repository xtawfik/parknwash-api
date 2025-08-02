<?php

namespace App\Containers\AccReceipt\UI\API\Transformers;

use App\Containers\AccReceipt\Models\AccReceipt;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;


class AccReceiptTransformer extends Transformer
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
        'bank_account',
'customer',
'supplier',
'user',
'accounts',
'items',
'footer',
'sales_invoice',
'inventory',

    ];

    /**
     * @param AccReceipt $entity
     *
     * @return array
     */
    public function transform(AccReceipt $entity)
    {
        $response = [
            'object' => 'AccReceipt',
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

    	public function includeBankAccount( AccReceipt $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}

	public function includeCustomer( AccReceipt $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSupplier( AccReceipt $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includeUser( AccReceipt $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeAccounts( AccReceipt $item ) {
		return $this->collection( $item->accounts, new AccProfitLossAccountTransformer() );
	}

	public function includeItems( AccReceipt $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeFooter( AccReceipt $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeSalesInvoice( AccReceipt $item ) {
		return $this->item( $item->sales_invoice, new AccSalesInvoiceTransformer() );
	}

	public function includeInventory( AccReceipt $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}


}
