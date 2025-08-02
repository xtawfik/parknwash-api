<?php

namespace App\Containers\AccForecast\UI\API\Transformers;

use App\Containers\AccForecast\Models\AccForecast;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccForecastTransformer extends Transformer
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
        'items',
'user',

    ];

    /**
     * @param AccForecast $entity
     *
     * @return array
     */
    public function transform(AccForecast $entity)
    {
        $response = [
            'object' => 'AccForecast',
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

    	public function includeItems( AccForecast $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeUser( AccForecast $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
