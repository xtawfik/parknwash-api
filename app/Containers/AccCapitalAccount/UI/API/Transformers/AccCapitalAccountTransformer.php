<?php

namespace App\Containers\AccCapitalAccount\UI\API\Transformers;

use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;


class AccCapitalAccountTransformer extends Transformer
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
'balance_sheet',
'division',
'place',
'division_place',
'control_account',
'account_category',

    ];

    /**
     * @param AccCapitalAccount $entity
     *
     * @return array
     */
    public function transform(AccCapitalAccount $entity)
    {
        $response = [
            'object' => 'AccCapitalAccount',
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

    	public function includeUser( AccCapitalAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBalanceSheet( AccCapitalAccount $item ) {
		return $this->item( $item->balance_sheet, new AccBalanceSheetTransformer() );
	}

	public function includeDivision( AccCapitalAccount $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccCapitalAccount $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccCapitalAccount $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeControlAccount( AccCapitalAccount $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeAccountCategory( AccCapitalAccount $item ) {
		return $this->item( $item->account_category, new AccAccountCategoryTransformer() );
	}


}
