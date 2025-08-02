<?php

namespace App\Containers\AccDivision\UI\API\Transformers;

use App\Containers\AccDivision\Models\AccDivision;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;


class AccDivisionTransformer extends Transformer
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
'places',

    ];

    /**
     * @param AccDivision $entity
     *
     * @return array
     */
    public function transform(AccDivision $entity)
    {
        $response = [
            'object' => 'AccDivision',
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

    	public function includeUser( AccDivision $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includePlaces( AccDivision $item ) {
		return $this->collection( $item->places, new AccPlaceTransformer() );
	}


}
