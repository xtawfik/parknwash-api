<?php

namespace App\Containers\EmployeeTermination\UI\API\Transformers;

use App\Containers\EmployeeTermination\Models\EmployeeTermination;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\ReasonToLeave\UI\API\Transformers\ReasonToLeaveTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class EmployeeTerminationTransformer extends Transformer
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
        'reason',
'employee',
'mall',

    ];

    /**
     * @param EmployeeTermination $entity
     *
     * @return array
     */
    public function transform(EmployeeTermination $entity)
    {
        $response = [
            'object' => 'EmployeeTermination',
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

    	public function includeReason( EmployeeTermination $item ) {
		return $this->item( $item->reason, new ReasonToLeaveTransformer() );
	}

	public function includeEmployee( EmployeeTermination $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeMall( EmployeeTermination $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}


}
