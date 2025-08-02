<?php

namespace App\Containers\Vacation\UI\API\Transformers;

use App\Containers\Vacation\Models\Vacation;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\VacationType\UI\API\Transformers\VacationTypeTransformer;


class VacationTransformer extends Transformer
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
'type',

    ];

    /**
     * @param Vacation $entity
     *
     * @return array
     */
    public function transform(Vacation $entity)
    {
        $response = [
            'object' => 'Vacation',
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

    	public function includeEmployee( Vacation $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeType( Vacation $item ) {
		return $this->item( $item->type, new VacationTypeTransformer() );
	}


}
