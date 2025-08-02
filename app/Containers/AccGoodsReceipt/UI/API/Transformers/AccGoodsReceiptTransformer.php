<?php

namespace App\Containers\AccGoodsReceipt\UI\API\Transformers;

use App\Containers\AccGoodsReceipt\Models\AccGoodsReceipt;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccPurchaseInvoice\UI\API\Transformers\AccPurchaseInvoiceTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccPurchaseOrder\UI\API\Transformers\AccPurchaseOrderTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;


class AccGoodsReceiptTransformer extends Transformer
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
'purchase_invoice',
'supplier',
'purchase_order',
'inventory',
'items',
'footer',

    ];

    /**
     * @param AccGoodsReceipt $entity
     *
     * @return array
     */
    public function transform(AccGoodsReceipt $entity)
    {
        $response = [
            'object' => 'AccGoodsReceipt',
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

    	public function includeUser( AccGoodsReceipt $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includePurchaseInvoice( AccGoodsReceipt $item ) {
		return $this->item( $item->purchase_invoice, new AccPurchaseInvoiceTransformer() );
	}

	public function includeSupplier( AccGoodsReceipt $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includePurchaseOrder( AccGoodsReceipt $item ) {
		return $this->item( $item->purchase_order, new AccPurchaseOrderTransformer() );
	}

	public function includeInventory( AccGoodsReceipt $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeItems( AccGoodsReceipt $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeFooter( AccGoodsReceipt $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}


}
