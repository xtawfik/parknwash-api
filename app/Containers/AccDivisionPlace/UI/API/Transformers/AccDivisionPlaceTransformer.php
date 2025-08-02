<?php

namespace App\Containers\AccDivisionPlace\UI\API\Transformers;

use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;


class AccDivisionPlaceTransformer extends Transformer
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
        'place',
'division',

    ];

    /**
     * @param AccDivisionPlace $entity
     *
     * @return array
     */
    public function transform(AccDivisionPlace $entity)
    {
        $response = [
            'object' => 'AccDivisionPlace',
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

    	public function includePlace( AccDivisionPlace $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivision( AccDivisionPlace $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}


}
