<?php

namespace App\Containers\CapitalTransaction\UI\API\Transformers;

use App\Containers\CapitalTransaction\Models\CapitalTransaction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Partner\UI\API\Transformers\PartnerTransformer;


class CapitalTransactionTransformer extends Transformer
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
        'country',
'mall',
'partner',

    ];

    /**
     * @param CapitalTransaction $entity
     *
     * @return array
     */
    public function transform(CapitalTransaction $entity)
    {
        $response = [
            'object' => 'CapitalTransaction',
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

    	public function includeCountry( CapitalTransaction $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( CapitalTransaction $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includePartner( CapitalTransaction $item ) {
		return $this->item( $item->partner, new PartnerTransformer() );
	}


}
