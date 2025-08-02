<?php

namespace App\Containers\Warehouse\UI\API\Transformers;

use App\Containers\Warehouse\Models\Warehouse;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;


class WarehouseTransformer extends Transformer
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
'supply',

    ];

    /**
     * @param Warehouse $entity
     *
     * @return array
     */
    public function transform(Warehouse $entity)
    {
        $response = [
            'object' => 'Warehouse',
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

    	public function includeCountry( Warehouse $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeSupply( Warehouse $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}


}
