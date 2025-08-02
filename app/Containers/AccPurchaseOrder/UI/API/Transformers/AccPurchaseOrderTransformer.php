<?php

namespace App\Containers\AccPurchaseOrder\UI\API\Transformers;

use App\Containers\AccPurchaseOrder\Models\AccPurchaseOrder;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccPurchaseQuote\UI\API\Transformers\AccPurchaseQuoteTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;


class AccPurchaseOrderTransformer extends Transformer
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
'items',

    ];

    /**
     * @param AccPurchaseOrder $entity
     *
     * @return array
     */
    public function transform(AccPurchaseOrder $entity)
    {
        $response = [
            'object' => 'AccPurchaseOrder',
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

    	public function includeUser( AccPurchaseOrder $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeSupplier( AccPurchaseOrder $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includePurchaseQuote( AccPurchaseOrder $item ) {
		return $this->item( $item->purchase_quote, new AccPurchaseQuoteTransformer() );
	}

	public function includeItems( AccPurchaseOrder $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}


}
