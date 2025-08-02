<?php

namespace App\Containers\AccRecurringCategory\UI\API\Transformers;

use App\Containers\AccRecurringCategory\Models\AccRecurringCategory;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccRecurringCategoryTransformer extends Transformer
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
     * @param AccRecurringCategory $entity
     *
     * @return array
     */
    public function transform(AccRecurringCategory $entity)
    {
        $response = [
            'object' => 'AccRecurringCategory',
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

    	public function includeUser( AccRecurringCategory $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
