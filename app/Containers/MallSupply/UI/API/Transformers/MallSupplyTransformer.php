<?php

namespace App\Containers\MallSupply\UI\API\Transformers;

use App\Containers\MallSupply\Models\MallSupply;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;


class MallSupplyTransformer extends Transformer
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
'mall',
'supply',

    ];

    /**
     * @param MallSupply $entity
     *
     * @return array
     */
    public function transform(MallSupply $entity)
    {
        $response = [
            'object' => 'MallSupply',
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

    	public function includeUser( MallSupply $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCountry( MallSupply $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( MallSupply $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeSupply( MallSupply $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}


}
