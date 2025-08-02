<?php

namespace App\Containers\AccWithholdingTaxReceipt\UI\API\Transformers;

use App\Containers\AccWithholdingTaxReceipt\Models\AccWithholdingTaxReceipt;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;


class AccWithholdingTaxReceiptTransformer extends Transformer
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
'customer',

    ];

    /**
     * @param AccWithholdingTaxReceipt $entity
     *
     * @return array
     */
    public function transform(AccWithholdingTaxReceipt $entity)
    {
        $response = [
            'object' => 'AccWithholdingTaxReceipt',
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

    	public function includeUser( AccWithholdingTaxReceipt $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCustomer( AccWithholdingTaxReceipt $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}


}
