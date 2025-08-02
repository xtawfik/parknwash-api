<?php

namespace App\Containers\AccCurrencyCurrency\UI\API\Transformers;

use App\Containers\AccCurrencyCurrency\Models\AccCurrencyCurrency;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCurrencyRevaluation\UI\API\Transformers\AccCurrencyRevaluationTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccCurrencyCurrencyTransformer extends Transformer
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
        'currency_revaluation',
'currency',
'user',

    ];

    /**
     * @param AccCurrencyCurrency $entity
     *
     * @return array
     */
    public function transform(AccCurrencyCurrency $entity)
    {
        $response = [
            'object' => 'AccCurrencyCurrency',
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

    	public function includeCurrencyRevaluation( AccCurrencyCurrency $item ) {
		return $this->item( $item->currency_revaluation, new AccCurrencyRevaluationTransformer() );
	}

	public function includeCurrency( AccCurrencyCurrency $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeUser( AccCurrencyCurrency $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
