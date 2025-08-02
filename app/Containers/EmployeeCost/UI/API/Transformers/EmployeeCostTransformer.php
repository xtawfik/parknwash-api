<?php

namespace App\Containers\EmployeeCost\UI\API\Transformers;

use App\Containers\EmployeeCost\Models\EmployeeCost;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;


class EmployeeCostTransformer extends Transformer
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
        'Employee',

    ];

    /**
     * @param EmployeeCost $entity
     *
     * @return array
     */
    public function transform(EmployeeCost $entity)
    {
        $response = [
            'object' => 'EmployeeCost',
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

    	public function includeEmployee( EmployeeCost $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}


}
