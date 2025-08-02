<?php

namespace App\Containers\AccAccountCategory\UI\API\Transformers;

use App\Containers\AccAccountCategory\Models\AccAccountCategory;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccAccountCategoryTransformer extends Transformer
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
     * @param AccAccountCategory $entity
     *
     * @return array
     */
    public function transform(AccAccountCategory $entity)
    {
        $response = [
            'object' => 'AccAccountCategory',
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

    	public function includeUser( AccAccountCategory $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
