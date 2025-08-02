<?php

namespace App\Containers\DamageRequest\UI\API\Transformers;

use App\Containers\DamageRequest\Models\DamageRequest;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class DamageRequestTransformer extends Transformer
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
'mall',
'user',

    ];

    /**
     * @param DamageRequest $entity
     *
     * @return array
     */
    public function transform(DamageRequest $entity)
    {
        $response = [
            'object' => 'DamageRequest',
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

    	public function includeSupply( DamageRequest $item ) {
		return $this->item( $item->supply, new SupplyTransformer() );
	}

	public function includeMall( DamageRequest $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeUser( DamageRequest $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
