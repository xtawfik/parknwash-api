<?php

namespace App\Containers\Allowance\UI\API\Transformers;

use App\Containers\Allowance\Models\Allowance;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AllowanceType\UI\API\Transformers\AllowanceTypeTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;


class AllowanceTransformer extends Transformer
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
        'type',
'employee',
'mall',
'country',

    ];

    /**
     * @param Allowance $entity
     *
     * @return array
     */
    public function transform(Allowance $entity)
    {
        $response = [
            'object' => 'Allowance',
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

    	public function includeType( Allowance $item ) {
		return $this->item( $item->type, new AllowanceTypeTransformer() );
	}

	public function includeEmployee( Allowance $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeMall( Allowance $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeCountry( Allowance $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}


}
