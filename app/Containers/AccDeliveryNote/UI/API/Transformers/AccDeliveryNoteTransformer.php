<?php

namespace App\Containers\AccDeliveryNote\UI\API\Transformers;

use App\Containers\AccDeliveryNote\Models\AccDeliveryNote;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSalesOrder\UI\API\Transformers\AccSalesOrderTransformer;
use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;


class AccDeliveryNoteTransformer extends Transformer
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
        'customer',
'sales_order',
'sales_invoice',
'user',
'inventory',
'items',
'footer',

    ];

    /**
     * @param AccDeliveryNote $entity
     *
     * @return array
     */
    public function transform(AccDeliveryNote $entity)
    {
        $response = [
            'object' => 'AccDeliveryNote',
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

    	public function includeCustomer( AccDeliveryNote $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSalesOrder( AccDeliveryNote $item ) {
		return $this->item( $item->sales_order, new AccSalesOrderTransformer() );
	}

	public function includeSalesInvoice( AccDeliveryNote $item ) {
		return $this->item( $item->sales_invoice, new AccSalesInvoiceTransformer() );
	}

	public function includeUser( AccDeliveryNote $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeInventory( AccDeliveryNote $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeItems( AccDeliveryNote $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeFooter( AccDeliveryNote $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}


}
