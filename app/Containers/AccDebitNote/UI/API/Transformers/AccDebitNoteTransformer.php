<?php

namespace App\Containers\AccDebitNote\UI\API\Transformers;

use App\Containers\AccDebitNote\Models\AccDebitNote;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccPurchaseInvoice\UI\API\Transformers\AccPurchaseInvoiceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;


class AccDebitNoteTransformer extends Transformer
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
'purchase_invoice',
'user',
'footer',
'supplier',

    ];

    /**
     * @param AccDebitNote $entity
     *
     * @return array
     */
    public function transform(AccDebitNote $entity)
    {
        $response = [
            'object' => 'AccDebitNote',
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

    	public function includeItems( AccDebitNote $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includePurchaseInvoice( AccDebitNote $item ) {
		return $this->item( $item->purchase_invoice, new AccPurchaseInvoiceTransformer() );
	}

	public function includeUser( AccDebitNote $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeFooter( AccDebitNote $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeSupplier( AccDebitNote $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}


}
