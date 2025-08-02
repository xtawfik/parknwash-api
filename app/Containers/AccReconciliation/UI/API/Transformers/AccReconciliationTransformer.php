<?php

namespace App\Containers\AccReconciliation\UI\API\Transformers;

use App\Containers\AccReconciliation\Models\AccReconciliation;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccReconciliationTransformer extends Transformer
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
        'bank_account',
'user',

    ];

    /**
     * @param AccReconciliation $entity
     *
     * @return array
     */
    public function transform(AccReconciliation $entity)
    {
        $response = [
            'object' => 'AccReconciliation',
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

    	public function includeBankAccount( AccReconciliation $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}

	public function includeUser( AccReconciliation $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
