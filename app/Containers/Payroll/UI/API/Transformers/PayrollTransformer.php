<?php

namespace App\Containers\Payroll\UI\API\Transformers;

use App\Containers\Payroll\Models\Payroll;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Account\UI\API\Transformers\AccountTransformer;


class PayrollTransformer extends Transformer
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
        'account',

    ];

    /**
     * @param Payroll $entity
     *
     * @return array
     */
    public function transform(Payroll $entity)
    {
        $response = [
            'object' => 'Payroll',
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

    	public function includeAccount( Payroll $item ) {
		return $this->item( $item->account, new AccountTransformer() );
	}


}
