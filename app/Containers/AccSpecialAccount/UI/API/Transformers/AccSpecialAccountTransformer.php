<?php

namespace App\Containers\AccSpecialAccount\UI\API\Transformers;

use App\Containers\AccSpecialAccount\Models\AccSpecialAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;


class AccSpecialAccountTransformer extends Transformer
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
        'control_account',
'balance_sheet',
'division',
'place',
'division_place',
'user',
'currency',
'account_category',

    ];

    /**
     * @param AccSpecialAccount $entity
     *
     * @return array
     */
    public function transform(AccSpecialAccount $entity)
    {
        $response = [
            'object' => 'AccSpecialAccount',
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

    	public function includeControlAccount( AccSpecialAccount $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeBalanceSheet( AccSpecialAccount $item ) {
		return $this->item( $item->balance_sheet, new AccBalanceSheetTransformer() );
	}

	public function includeDivision( AccSpecialAccount $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccSpecialAccount $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccSpecialAccount $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeUser( AccSpecialAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCurrency( AccSpecialAccount $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeAccountCategory( AccSpecialAccount $item ) {
		return $this->item( $item->account_category, new AccAccountCategoryTransformer() );
	}


}
