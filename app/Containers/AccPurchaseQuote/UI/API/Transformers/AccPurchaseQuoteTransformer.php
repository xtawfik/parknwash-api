<?php

namespace App\Containers\AccPurchaseQuote\UI\API\Transformers;

use App\Containers\AccPurchaseQuote\Models\AccPurchaseQuote;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;


class AccPurchaseQuoteTransformer extends Transformer
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
'footer',
'items',

    ];

    /**
     * @param AccPurchaseQuote $entity
     *
     * @return array
     */
    public function transform(AccPurchaseQuote $entity)
    {
        $response = [
            'object' => 'AccPurchaseQuote',
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

    	public function includeUser( AccPurchaseQuote $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeSupplier( AccPurchaseQuote $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}

	public function includeFooter( AccPurchaseQuote $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeItems( AccPurchaseQuote $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}


}
