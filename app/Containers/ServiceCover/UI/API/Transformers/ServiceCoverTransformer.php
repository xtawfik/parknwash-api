<?php

namespace App\Containers\ServiceCover\UI\API\Transformers;

use App\Containers\ServiceCover\Models\ServiceCover;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Service\UI\API\Transformers\ServiceTransformer;
use App\Containers\Cover\UI\API\Transformers\CoverTransformer;


class ServiceCoverTransformer extends Transformer
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
        'service',
'cover',

    ];

    /**
     * @param ServiceCover $entity
     *
     * @return array
     */
    public function transform(ServiceCover $entity)
    {
        $response = [
            'object' => 'ServiceCover',
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

    	public function includeService( ServiceCover $item ) {
		return $this->item( $item->service, new ServiceTransformer() );
	}

	public function includeCover( ServiceCover $item ) {
		return $this->item( $item->cover, new CoverTransformer() );
	}


}
