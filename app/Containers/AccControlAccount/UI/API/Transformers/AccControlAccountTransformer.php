<?php

namespace App\Containers\AccControlAccount\UI\API\Transformers;

use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Containers\AccControlType\UI\API\Transformers\AccControlTypeTransformer;
use App\Containers\AccSpecialAccount\UI\API\Transformers\AccSpecialAccountTransformer;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;
use App\Containers\AccCapitalSubAccount\UI\API\Transformers\AccCapitalSubAccountTransformer;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;


class AccControlAccountTransformer extends Transformer
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
'control_type',
'special_accounts',
'capital_accounts',
'capital_subaccounts',
'account_category',

    ];

    /**
     * @param AccControlAccount $entity
     *
     * @return array
     */
    public function transform(AccControlAccount $entity)
    {
        $response = [
            'object' => 'AccControlAccount',
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

    	public function includeUser( AccControlAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBalanceSheet( AccControlAccount $item ) {
		return $this->item( $item->balance_sheet, new AccBalanceSheetTransformer() );
	}

	public function includeControlType( AccControlAccount $item ) {
		return $this->item( $item->control_type, new AccControlTypeTransformer() );
	}

	public function includeSpecialAccounts( AccControlAccount $item ) {
		return $this->collection( $item->special_accounts, new AccSpecialAccountTransformer() );
	}

	public function includeCapitalAccounts( AccControlAccount $item ) {
		return $this->collection( $item->capital_accounts, new AccCapitalAccountTransformer() );
	}

	public function includeCapitalSubaccounts( AccControlAccount $item ) {
		return $this->collection( $item->capital_subaccounts, new AccCapitalSubAccountTransformer() );
	}

	public function includeAccountCategory( AccControlAccount $item ) {
		return $this->item( $item->account_category, new AccAccountCategoryTransformer() );
	}


}
