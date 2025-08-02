<?php

namespace App\Containers\Receipt\UI\API\Transformers;

use App\Containers\Receipt\Models\Receipt;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Account\UI\API\Transformers\AccountTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;


class ReceiptTransformer extends Transformer
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
'employee',

    ];

    /**
     * @param Receipt $entity
     *
     * @return array
     */
    public function transform(Receipt $entity)
    {
        $response = [
            'object' => 'Receipt',
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

    	public function includeAccount( Receipt $item ) {
		return $this->item( $item->account, new AccountTransformer() );
	}

	public function includeEmployee( Receipt $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}


}
