<?php

namespace App\Containers\AccCurrencyRevaluation\UI\API\Transformers;

use App\Containers\AccCurrencyRevaluation\Models\AccCurrencyRevaluation;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCurrencyRevaluationaItem\UI\API\Transformers\AccCurrencyRevaluationaItemTransformer;
use App\Containers\AccCurrencyCurrency\UI\API\Transformers\AccCurrencyCurrencyTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccCurrencyRevaluationTransformer extends Transformer
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
        'items',
'currencies',
'user',

    ];

    /**
     * @param AccCurrencyRevaluation $entity
     *
     * @return array
     */
    public function transform(AccCurrencyRevaluation $entity)
    {
        $response = [
            'object' => 'AccCurrencyRevaluation',
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

    	public function includeItems( AccCurrencyRevaluation $item ) {
		return $this->collection( $item->items, new AccCurrencyRevaluationaItemTransformer() );
	}

	public function includeCurrencies( AccCurrencyRevaluation $item ) {
		return $this->collection( $item->currencies, new AccCurrencyCurrencyTransformer() );
	}

	public function includeUser( AccCurrencyRevaluation $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
