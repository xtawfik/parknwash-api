<?php

namespace App\Containers\AccSalesQuote\UI\API\Transformers;

use App\Containers\AccSalesQuote\Models\AccSalesQuote;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;


class AccSalesQuoteTransformer extends Transformer
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
'customer',
'footer',

    ];

    /**
     * @param AccSalesQuote $entity
     *
     * @return array
     */
    public function transform(AccSalesQuote $entity)
    {
        $response = [
            'object' => 'AccSalesQuote',
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

    	public function includeItems( AccSalesQuote $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeUser( AccSalesQuote $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCustomer( AccSalesQuote $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeFooter( AccSalesQuote $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}


}
