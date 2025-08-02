<?php

namespace App\Containers\Stock\UI\API\Transformers;

use App\Containers\Stock\Models\Stock;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class StockTransformer extends Transformer
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
        'supply',
'user',
'country',

    ];

    /**
     * @param Stock $entity
     *
     * @return array
     */
    public function transform(Stock $entity)
    {
        $response = [
            'object' => 'Stock',
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

    	public function includeSupply( Stock $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}

	public function includeUser( Stock $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCountry( Stock $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
