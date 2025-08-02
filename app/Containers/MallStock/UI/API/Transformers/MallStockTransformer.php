<?php

namespace App\Containers\MallStock\UI\API\Transformers;

use App\Containers\MallStock\Models\MallStock;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;


class MallStockTransformer extends Transformer
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
'supply',

    ];

    /**
     * @param MallStock $entity
     *
     * @return array
     */
    public function transform(MallStock $entity)
    {
        $response = [
            'object' => 'MallStock',
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

    	public function includeCountry( MallStock $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( MallStock $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeSupply( MallStock $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}


}
