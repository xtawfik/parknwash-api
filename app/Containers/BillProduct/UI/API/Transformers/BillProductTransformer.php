<?php

namespace App\Containers\BillProduct\UI\API\Transformers;

use App\Containers\BillProduct\Models\BillProduct;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Bill\UI\API\Transformers\BillTransformer;
use App\Containers\Product\UI\API\Transformers\ProductTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class BillProductTransformer extends Transformer
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
        'bill',
'product',
'country',
'mall',

    ];

    /**
     * @param BillProduct $entity
     *
     * @return array
     */
    public function transform(BillProduct $entity)
    {
        $response = [
            'object' => 'BillProduct',
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

    	public function includeBill( BillProduct $item ) {
		return $this->item( $item->bill, new BillTransformer() );
	}

	public function includeProduct( BillProduct $item ) {
		return $this->item( $item->product, new ProductTransformer() );
	}

	public function includeCountry( BillProduct $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( BillProduct $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}


}
