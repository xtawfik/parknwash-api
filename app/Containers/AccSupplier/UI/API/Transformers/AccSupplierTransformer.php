<?php

namespace App\Containers\AccSupplier\UI\API\Transformers;

use App\Containers\AccSupplier\Models\AccSupplier;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccPurchaseQuote\UI\API\Transformers\AccPurchaseQuoteTransformer;
use App\Containers\AccPurchaseOrder\UI\API\Transformers\AccPurchaseOrderTransformer;
use App\Containers\AccPurchaseInvoice\UI\API\Transformers\AccPurchaseInvoiceTransformer;
use App\Containers\AccDebitNote\UI\API\Transformers\AccDebitNoteTransformer;
use App\Containers\AccGoodsReceipt\UI\API\Transformers\AccGoodsReceiptTransformer;


class AccSupplierTransformer extends Transformer
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
        'currency',
'division',
'place',
'division_place',
'control_account',
'user',
'quotes',
'orders',
'invoices',
'debit_notes',
'goods_receipts',

    ];

    /**
     * @param AccSupplier $entity
     *
     * @return array
     */
    public function transform(AccSupplier $entity)
    {
        $response = [
            'object' => 'AccSupplier',
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

    	public function includeCurrency( AccSupplier $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeDivision( AccSupplier $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccSupplier $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccSupplier $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeControlAccount( AccSupplier $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeUser( AccSupplier $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeQuotes( AccSupplier $item ) {
		return $this->collection( $item->quotes, new AccPurchaseQuoteTransformer() );
	}

	public function includeOrders( AccSupplier $item ) {
		return $this->collection( $item->orders, new AccPurchaseOrderTransformer() );
	}

	public function includeInvoices( AccSupplier $item ) {
		return $this->collection( $item->invoices, new AccPurchaseInvoiceTransformer() );
	}

	public function includeDebitNotes( AccSupplier $item ) {
		return $this->collection( $item->debit_notes, new AccDebitNoteTransformer() );
	}

	public function includeGoodsReceipts( AccSupplier $item ) {
		return $this->collection( $item->goods_receipts, new AccGoodsReceiptTransformer() );
	}


}
