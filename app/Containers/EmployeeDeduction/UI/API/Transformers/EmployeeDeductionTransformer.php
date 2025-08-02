<?php

namespace App\Containers\EmployeeDeduction\UI\API\Transformers;

use App\Containers\EmployeeDeduction\Models\EmployeeDeduction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\EmployeeDeductionType\UI\API\Transformers\EmployeeDeductionTypeTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class EmployeeDeductionTransformer extends Transformer
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

    ];

    /**
     * @param EmployeeDeduction $entity
     *
     * @return array
     */
    public function transform(EmployeeDeduction $entity)
    {
        $response = [
            'object' => 'EmployeeDeduction',
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

    	public function includeType( EmployeeDeduction $item ) {
		return $this->item( $item->type, new EmployeeDeductionTypeTransformer() );
	}

	public function includeEmployee( EmployeeDeduction $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeMall( EmployeeDeduction $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}


}
