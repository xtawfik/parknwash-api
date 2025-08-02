<?php

namespace App\Containers\Request\UI\API\Transformers;

use App\Containers\Request\Models\Request;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\RequestItem\UI\API\Transformers\RequestItemTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class RequestTransformer extends Transformer
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
'mall',
'request_items',
'country',

    ];

    /**
     * @param Request $entity
     *
     * @return array
     */
    public function transform(Request $entity)
    {
        $response = [
            'object' => 'Request',
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

    	public function includeUser( Request $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeMall( Request $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeRequestItems( Request $item ) {
		return $this->collection( $item->request_items, new RequestItemTransformer() );
	}

	public function includeCountry( Request $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
