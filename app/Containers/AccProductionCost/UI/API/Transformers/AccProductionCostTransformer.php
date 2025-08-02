<?php

namespace App\Containers\AccProductionCost\UI\API\Transformers;

use App\Containers\AccProductionCost\Models\AccProductionCost;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccProductionOrder\UI\API\Transformers\AccProductionOrderTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccProductionCostTransformer extends Transformer
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
        'division',
'division_place',
'place',
'profit_loss_accoun',
'balance_sheet_account',
'production_order',
'user',

    ];

    /**
     * @param AccProductionCost $entity
     *
     * @return array
     */
    public function transform(AccProductionCost $entity)
    {
        $response = [
            'object' => 'AccProductionCost',
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

    	public function includeDivision( AccProductionCost $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeDivisionPlace( AccProductionCost $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includePlace( AccProductionCost $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeProfitLossAccoun( AccProductionCost $item ) {
		return $this->item( $item->profit_loss_accoun, new AccProfitLossAccountTransformer() );
	}

	public function includeBalanceSheetAccount( AccProductionCost $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includeProductionOrder( AccProductionCost $item ) {
		return $this->item( $item->production_order, new AccProductionOrderTransformer() );
	}

	public function includeUser( AccProductionCost $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
