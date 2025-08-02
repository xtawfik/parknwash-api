<?php

namespace App\Containers\AccInvestmentRevaluationItem\UI\API\Transformers;

use App\Containers\AccInvestmentRevaluationItem\Models\AccInvestmentRevaluationItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccInvestmentRevaluation\UI\API\Transformers\AccInvestmentRevaluationTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccInvestment\UI\API\Transformers\AccInvestmentTransformer;


class AccInvestmentRevaluationItemTransformer extends Transformer
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
        'investment_revaluation',
'user',
'investment',

    ];

    /**
     * @param AccInvestmentRevaluationItem $entity
     *
     * @return array
     */
    public function transform(AccInvestmentRevaluationItem $entity)
    {
        $response = [
            'object' => 'AccInvestmentRevaluationItem',
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

    	public function includeInvestmentRevaluation( AccInvestmentRevaluationItem $item ) {
		return $this->item( $item->investment_revaluation, new AccInvestmentRevaluationTransformer() );
	}

	public function includeUser( AccInvestmentRevaluationItem $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeInvestment( AccInvestmentRevaluationItem $item ) {
		return $this->item( $item->investment, new AccInvestmentTransformer() );
	}


}
