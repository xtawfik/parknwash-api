<?php

namespace App\Containers\SupplyInvoice\UI\API\Transformers;

use App\Containers\SupplyInvoice\Models\SupplyInvoice;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;


class SupplyInvoiceTransformer extends Transformer
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
'country',
'supply',

    ];

    /**
     * @param SupplyInvoice $entity
     *
     * @return array
     */
    public function transform(SupplyInvoice $entity)
    {
        $response = [
            'object' => 'SupplyInvoice',
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

    	public function includeUser( SupplyInvoice $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCountry( SupplyInvoice $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeSupply( SupplyInvoice $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}


}
