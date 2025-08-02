<?php

namespace App\Containers\AccClearedBalance\UI\API\Transformers;

use App\Containers\AccClearedBalance\Models\AccClearedBalance;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;


class AccClearedBalanceTransformer extends Transformer
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

    ];

    /**
     * @param AccClearedBalance $entity
     *
     * @return array
     */
    public function transform(AccClearedBalance $entity)
    {
        $response = [
            'object' => 'AccClearedBalance',
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

    	public function includeBankAccount( AccClearedBalance $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}


}
