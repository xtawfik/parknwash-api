<?php

namespace App\Containers\Park\UI\API\Transformers;

use App\Containers\Park\Models\Park;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class ParkTransformer extends Transformer
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
        'mall',

    ];

    /**
     * @param Park $entity
     *
     * @return array
     */
    public function transform(Park $entity)
    {
        $response = [
            'object' => 'Park',
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

    	public function includeMall( Park $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}


}
