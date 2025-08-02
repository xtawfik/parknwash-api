<?php

namespace App\Containers\AccSalesOrder\UI\API\Transformers;

use App\Containers\AccSalesOrder\Models\AccSalesOrder;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSalesQuote\UI\API\Transformers\AccSalesQuoteTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;


class AccSalesOrderTransformer extends Transformer
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
'footer',
'customer',
'sales_quote',
'items',

    ];

    /**
     * @param AccSalesOrder $entity
     *
     * @return array
     */
    public function transform(AccSalesOrder $entity)
    {
        $response = [
            'object' => 'AccSalesOrder',
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

    	public function includeUser( AccSalesOrder $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeFooter( AccSalesOrder $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeCustomer( AccSalesOrder $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSalesQuote( AccSalesOrder $item ) {
		return $this->item( $item->sales_quote, new AccSalesQuoteTransformer() );
	}

	public function includeItems( AccSalesOrder $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}


}
