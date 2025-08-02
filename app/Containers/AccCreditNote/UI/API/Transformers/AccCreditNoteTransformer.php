<?php

namespace App\Containers\AccCreditNote\UI\API\Transformers;

use App\Containers\AccCreditNote\Models\AccCreditNote;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;


class AccCreditNoteTransformer extends Transformer
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
        'sales_invoice',
'customer',
'user',
'items',
'footer',
'inventory',

    ];

    /**
     * @param AccCreditNote $entity
     *
     * @return array
     */
    public function transform(AccCreditNote $entity)
    {
        $response = [
            'object' => 'AccCreditNote',
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

    	public function includeSalesInvoice( AccCreditNote $item ) {
		return $this->item( $item->sales_invoice, new AccSalesInvoiceTransformer() );
	}

	public function includeCustomer( AccCreditNote $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeUser( AccCreditNote $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeItems( AccCreditNote $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeFooter( AccCreditNote $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeInventory( AccCreditNote $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}


}
