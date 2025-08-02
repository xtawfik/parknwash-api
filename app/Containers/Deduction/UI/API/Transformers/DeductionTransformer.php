<?php

namespace App\Containers\Deduction\UI\API\Transformers;

use App\Containers\Deduction\Models\Deduction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\DeductionType\UI\API\Transformers\DeductionTypeTransformer;
use App\Containers\Account\UI\API\Transformers\AccountTransformer;


class DeductionTransformer extends Transformer
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
        'mall',
'employee',
'type',
'account',

    ];

    /**
     * @param Deduction $entity
     *
     * @return array
     */
    public function transform(Deduction $entity)
    {
        $response = [
            'object' => 'Deduction',
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

    	public function includeMall( Deduction $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeEmployee( Deduction $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeType( Deduction $item ) {
		return $this->item( $item->type, new DeductionTypeTransformer() );
	}

	public function includeAccount( Deduction $item ) {
		return $this->item( $item->account, new AccountTransformer() );
	}


}
