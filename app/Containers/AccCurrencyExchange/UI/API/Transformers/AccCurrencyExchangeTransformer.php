<?php

namespace App\Containers\AccCurrencyExchange\UI\API\Transformers;

use App\Containers\AccCurrencyExchange\Models\AccCurrencyExchange;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccCurrencyExchangeTransaction\UI\API\Transformers\AccCurrencyExchangeTransactionTransformer;


class AccCurrencyExchangeTransformer extends Transformer
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
        'currency',
'transactions',

    ];

    /**
     * @param AccCurrencyExchange $entity
     *
     * @return array
     */
    public function transform(AccCurrencyExchange $entity)
    {
        $response = [
            'object' => 'AccCurrencyExchange',
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

    	public function includeCurrency( AccCurrencyExchange $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeTransactions( AccCurrencyExchange $item ) {
		return $this->collection( $item->transactions, new AccCurrencyExchangeTransactionTransformer() );
	}


}
