<?php

namespace App\Containers\Transaction\UI\API\Transformers;

use App\Containers\Transaction\Models\Transaction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Account\UI\API\Transformers\AccountTransformer;


class TransactionTransformer extends Transformer
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
     * @param Transaction $entity
     *
     * @return array
     */
    public function transform(Transaction $entity)
    {
        $response = [
            'object' => 'Transaction',
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

    	public function includeAccount( Transaction $item ) {
		return $this->item( $item->account, new AccountTransformer() );
	}


}
