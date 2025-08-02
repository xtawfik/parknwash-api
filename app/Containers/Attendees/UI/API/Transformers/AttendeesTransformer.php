<?php

namespace App\Containers\Attendees\UI\API\Transformers;

use App\Containers\Attendees\Models\Attendees;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;


class AttendeesTransformer extends Transformer
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
        'country',
'mall',
'employee',

    ];

    /**
     * @param Attendees $entity
     *
     * @return array
     */
    public function transform(Attendees $entity)
    {
        $response = [
            'object' => 'Attendees',
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

    	public function includeCountry( Attendees $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( Attendees $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeEmployee( Attendees $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}


}
