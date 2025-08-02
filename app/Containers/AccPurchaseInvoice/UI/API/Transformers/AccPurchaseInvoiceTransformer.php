<?php

namespace App\Containers\AccPurchaseInvoice\UI\API\Transformers;

use App\Containers\AccPurchaseInvoice\Models\AccPurchaseInvoice;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccPurchaseQuote\UI\API\Transformers\AccPurchaseQuoteTransformer;
use App\Containers\AccPurchaseOrder\UI\API\Transformers\AccPurchaseOrderTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;


class AccPurchaseInvoiceTransformer extends Transformer
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
'supplier',
'purchase_quote',
'purchase_order',
'footer',
'items',

    ];

    /**
     * @param AccPurchaseInvoice $entity
     *
     * @return array
     */
    public function transform(AccPurchaseInvoice $entity)
    {
        $response = [
            'object' => 'AccPurchaseInvoice',
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

    	public function includeUser( AccPurchaseInvoice $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeSupplier( AccPurchaseInvoice $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includePurchaseQuote( AccPurchaseInvoice $item ) {
		return $this->item( $item->purchase_quote, new AccPurchaseQuoteTransformer() );
	}

	public function includePurchaseOrder( AccPurchaseInvoice $item ) {
		return $this->item( $item->purchase_order, new AccPurchaseOrderTransformer() );
	}

	public function includeFooter( AccPurchaseInvoice $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeItems( AccPurchaseInvoice $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}


}
