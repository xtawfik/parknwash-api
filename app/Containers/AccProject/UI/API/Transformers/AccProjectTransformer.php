<?php

namespace App\Containers\AccProject\UI\API\Transformers;

use App\Containers\AccProject\Models\AccProject;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccProjectTransformer extends Transformer
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

    ];

    /**
     * @param AccProject $entity
     *
     * @return array
     */
    public function transform(AccProject $entity)
    {
        $response = [
            'object' => 'AccProject',
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

    	public function includeUser( AccProject $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
