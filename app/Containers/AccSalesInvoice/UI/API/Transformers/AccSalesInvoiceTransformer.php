<?php

namespace App\Containers\AccSalesInvoice\UI\API\Transformers;

use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSalesQuote\UI\API\Transformers\AccSalesQuoteTransformer;
use App\Containers\AccSalesOrder\UI\API\Transformers\AccSalesOrderTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;


class AccSalesInvoiceTransformer extends Transformer
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
'customer',
'sales_quote',
'sales_order',
'inventory',

    ];

    /**
     * @param AccSalesInvoice $entity
     *
     * @return array
     */
    public function transform(AccSalesInvoice $entity)
    {
        $response = [
            'object' => 'AccSalesInvoice',
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

    	public function includeItems( AccSalesInvoice $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeUser( AccSalesInvoice $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeFooter( AccSalesInvoice $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeCustomer( AccSalesInvoice $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSalesQuote( AccSalesInvoice $item ) {
		return $this->item( $item->sales_quote, new AccSalesQuoteTransformer() );
	}

	public function includeSalesOrder( AccSalesInvoice $item ) {
		return $this->item( $item->sales_order, new AccSalesOrderTransformer() );
	}

	public function includeInventory( AccSalesInvoice $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}


}
