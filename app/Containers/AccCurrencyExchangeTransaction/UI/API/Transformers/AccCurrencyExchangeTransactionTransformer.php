<?php

namespace App\Containers\AccCurrencyExchangeTransaction\UI\API\Transformers;

use App\Containers\AccCurrencyExchangeTransaction\Models\AccCurrencyExchangeTransaction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCurrencyExchange\UI\API\Transformers\AccCurrencyExchangeTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccCurrencyExchangeTransactionTransformer extends Transformer
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
        'currency_exchange',
'user',

    ];

    /**
     * @param AccCurrencyExchangeTransaction $entity
     *
     * @return array
     */
    public function transform(AccCurrencyExchangeTransaction $entity)
    {
        $response = [
            'object' => 'AccCurrencyExchangeTransaction',
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

    	public function includeCurrencyExchange( AccCurrencyExchangeTransaction $item ) {
		return $this->item( $item->currency_exchange, new AccCurrencyExchangeTransformer() );
	}

	public function includeUser( AccCurrencyExchangeTransaction $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
