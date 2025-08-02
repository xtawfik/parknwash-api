<?php

namespace App\Containers\AccBankStatement\UI\API\Transformers;

use App\Containers\AccBankStatement\Models\AccBankStatement;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;


class AccBankStatementTransformer extends Transformer
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
        'user',
'bank_account',

    ];

    /**
     * @param AccBankStatement $entity
     *
     * @return array
     */
    public function transform(AccBankStatement $entity)
    {
        $response = [
            'object' => 'AccBankStatement',
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

    	public function includeUser( AccBankStatement $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBankAccount( AccBankStatement $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}


}
