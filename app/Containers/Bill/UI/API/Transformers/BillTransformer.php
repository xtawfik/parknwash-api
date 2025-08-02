<?php

namespace App\Containers\Bill\UI\API\Transformers;

use App\Containers\Bill\Models\Bill;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Vendor\UI\API\Transformers\VendorTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class BillTransformer extends Transformer
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
        'vendor',
'mall',
'country',

    ];

    /**
     * @param Bill $entity
     *
     * @return array
     */
    public function transform(Bill $entity)
    {
        $response = [
            'object' => 'Bill',
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

    	public function includeVendor( Bill $item ) {
		return $this->item( $item->vendor, new VendorTransformer() );
	}

	public function includeMall( Bill $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeCountry( Bill $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
