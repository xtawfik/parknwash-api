<?php

namespace App\Containers\AccBillableTime\UI\API\Transformers;

use App\Containers\AccBillableTime\Models\AccBillableTime;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccBillableTimeTransformer extends Transformer
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
'division',
'place',
'division_place',
'sales_invoice',
'user',

    ];

    /**
     * @param AccBillableTime $entity
     *
     * @return array
     */
    public function transform(AccBillableTime $entity)
    {
        $response = [
            'object' => 'AccBillableTime',
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

    	public function includeCustomer( AccBillableTime $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeDivision( AccBillableTime $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccBillableTime $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccBillableTime $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeSalesInvoice( AccBillableTime $item ) {
		return $this->item( $item->sales_invoice, new AccSalesInvoiceTransformer() );
	}

	public function includeUser( AccBillableTime $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
