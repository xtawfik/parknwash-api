<?php

namespace App\Containers\HandOver\UI\API\Transformers;

use App\Containers\HandOver\Models\HandOver;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class HandOverTransformer extends Transformer
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
        'employee',
'supervisor',
'mall',
'country',

    ];

    /**
     * @param HandOver $entity
     *
     * @return array
     */
    public function transform(HandOver $entity)
    {
        $response = [
            'object' => 'HandOver',
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

    	public function includeEmployee( HandOver $item ) {
		return $this->item( $item->employee, new UserTransformer() );
	}

	public function includeSupervisor( HandOver $item ) {
		return $this->item( $item->supervisor, new UserTransformer() );
	}

	public function includeMall( HandOver $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeCountry( HandOver $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
