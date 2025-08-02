<?php

namespace App\Containers\AccInvestment\UI\API\Transformers;

use App\Containers\AccInvestment\Models\AccInvestment;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccInvestmentRevaluation\UI\API\Transformers\AccInvestmentRevaluationTransformer;


class AccInvestmentTransformer extends Transformer
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
'control_account',
'currency',
'investment_revaluations',

    ];

    /**
     * @param AccInvestment $entity
     *
     * @return array
     */
    public function transform(AccInvestment $entity)
    {
        $response = [
            'object' => 'AccInvestment',
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

    	public function includeUser( AccInvestment $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeControlAccount( AccInvestment $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeCurrency( AccInvestment $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeInvestmentRevaluations( AccInvestment $item ) {
		return $this->collection( $item->investment_revaluations, new AccInvestmentRevaluationTransformer() );
	}


}
