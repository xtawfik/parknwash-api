<?php

namespace App\Containers\AccHistory\UI\API\Transformers;

use App\Containers\AccHistory\Models\AccHistory;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccHistoryTransformer extends Transformer
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
     * @param AccHistory $entity
     *
     * @return array
     */
    public function transform(AccHistory $entity)
    {
        $response = [
            'object' => 'AccHistory',
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

    	public function includeUser( AccHistory $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
