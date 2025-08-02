<?php

namespace App\Containers\AccCapitalSubAccount\UI\API\Transformers;

use App\Containers\AccCapitalSubAccount\Models\AccCapitalSubAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Containers\AccProfitLoss\UI\API\Transformers\AccProfitLossTransformer;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;


class AccCapitalSubAccountTransformer extends Transformer
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
'balance_sheet',
'profit_loss',
'capital_account',
'account_category',

    ];

    /**
     * @param AccCapitalSubAccount $entity
     *
     * @return array
     */
    public function transform(AccCapitalSubAccount $entity)
    {
        $response = [
            'object' => 'AccCapitalSubAccount',
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

    	public function includeUser( AccCapitalSubAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeControlAccount( AccCapitalSubAccount $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeBalanceSheet( AccCapitalSubAccount $item ) {
		return $this->item( $item->balance_sheet, new AccBalanceSheetTransformer() );
	}

	public function includeProfitLoss( AccCapitalSubAccount $item ) {
		return $this->item( $item->profit_loss, new AccProfitLossTransformer() );
	}

	public function includeCapitalAccount( AccCapitalSubAccount $item ) {
		return $this->item( $item->capital_account, new AccCapitalAccountTransformer() );
	}

	public function includeAccountCategory( AccCapitalSubAccount $item ) {
		return $this->item( $item->account_category, new AccAccountCategoryTransformer() );
	}


}
