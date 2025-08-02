<?php

namespace App\Containers\AccLatePayment\UI\API\Transformers;

use App\Containers\AccLatePayment\Models\AccLatePayment;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;


class AccLatePaymentTransformer extends Transformer
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
'user',
'customer',

    ];

    /**
     * @param AccLatePayment $entity
     *
     * @return array
     */
    public function transform(AccLatePayment $entity)
    {
        $response = [
            'object' => 'AccLatePayment',
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

    	public function includeSalesInvoice( AccLatePayment $item ) {
		return $this->item( $item->sales_invoice, new AccSalesInvoiceTransformer() );
	}

	public function includeUser( AccLatePayment $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCustomer( AccLatePayment $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}


}
