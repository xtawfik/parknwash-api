<?php

namespace App\Containers\AccBalanceSheet\UI\API\Transformers;

use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccCapitalSubAccount\UI\API\Transformers\AccCapitalSubAccountTransformer;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;


class AccBalanceSheetTransformer extends Transformer
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
        'parent',
'user',
'balance_sheet_accounts',
'control_accounts',
'subaccounts',
'capital_accounts',

    ];

    /**
     * @param AccBalanceSheet $entity
     *
     * @return array
     */
    public function transform(AccBalanceSheet $entity)
    {
        $response = [
            'object' => 'AccBalanceSheet',
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

    	public function includeParent( AccBalanceSheet $item ) {
		return $this->item( $item->parent, new AccBalanceSheetTransformer() );
	}

	public function includeUser( AccBalanceSheet $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBalanceSheetAccounts( AccBalanceSheet $item ) {
		return $this->collection( $item->balance_sheet_accounts, new AccBalanceSheetAccountTransformer() );
	}

	public function includeControlAccounts( AccBalanceSheet $item ) {
		return $this->collection( $item->control_accounts, new AccControlAccountTransformer() );
	}

	public function includeSubaccounts( AccBalanceSheet $item ) {
		return $this->collection( $item->subaccounts, new AccCapitalSubAccountTransformer() );
	}

	public function includeCapitalAccounts( AccBalanceSheet $item ) {
		return $this->collection( $item->capital_accounts, new AccCapitalAccountTransformer() );
	}


}
