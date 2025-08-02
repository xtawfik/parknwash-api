<?php

namespace App\Containers\AccInvestmentRevaluation\UI\API\Transformers;

use App\Containers\AccInvestmentRevaluation\Models\AccInvestmentRevaluation;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccInvestmentRevaluationItem\UI\API\Transformers\AccInvestmentRevaluationItemTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccFixedAsset\UI\API\Transformers\AccFixedAssetTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;


class AccInvestmentRevaluationTransformer extends Transformer
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
'user',
'division',
'fixed_asset',
'place',
'division_place',

    ];

    /**
     * @param AccInvestmentRevaluation $entity
     *
     * @return array
     */
    public function transform(AccInvestmentRevaluation $entity)
    {
        $response = [
            'object' => 'AccInvestmentRevaluation',
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

    	public function includeItems( AccInvestmentRevaluation $item ) {
		return $this->collection( $item->items, new AccInvestmentRevaluationItemTransformer() );
	}

	public function includeUser( AccInvestmentRevaluation $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeDivision( AccInvestmentRevaluation $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeFixedAsset( AccInvestmentRevaluation $item ) {
		return $this->item( $item->fixed_asset, new AccFixedAssetTransformer() );
	}

	public function includePlace( AccInvestmentRevaluation $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccInvestmentRevaluation $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}


}
