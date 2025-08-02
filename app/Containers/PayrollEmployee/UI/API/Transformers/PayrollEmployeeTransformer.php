<?php

namespace App\Containers\PayrollEmployee\UI\API\Transformers;

use App\Containers\PayrollEmployee\Models\PayrollEmployee;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Payroll\UI\API\Transformers\PayrollTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;


class PayrollEmployeeTransformer extends Transformer
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
        'payroll',
'employee',

    ];

    /**
     * @param PayrollEmployee $entity
     *
     * @return array
     */
    public function transform(PayrollEmployee $entity)
    {
        $response = [
            'object' => 'PayrollEmployee',
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

    	public function includePayroll( PayrollEmployee $item ) {
		return $this->item( $item->payroll, new PayrollTransformer() );
	}

	public function includeEmployee( PayrollEmployee $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}


}
