<?php

namespace App\Containers\AccProfitLoss\UI\API\Transformers;

use App\Containers\AccProfitLoss\Models\AccProfitLoss;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccProfitLoss\UI\API\Transformers\AccProfitLossTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccCapitalSubAccount\UI\API\Transformers\AccCapitalSubAccountTransformer;


class AccProfitLossTransformer extends Transformer
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
'profit_loss_accounts',
'subaccounts',

    ];

    /**
     * @param AccProfitLoss $entity
     *
     * @return array
     */
    public function transform(AccProfitLoss $entity)
    {
        $response = [
            'object' => 'AccProfitLoss',
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

    	public function includeParent( AccProfitLoss $item ) {
		return $this->item( $item->parent, new AccProfitLossTransformer() );
	}

	public function includeUser( AccProfitLoss $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeProfitLossAccounts( AccProfitLoss $item ) {
		return $this->collection( $item->profit_loss_accounts, new AccProfitLossAccountTransformer() );
	}

	public function includeSubaccounts( AccProfitLoss $item ) {
		return $this->collection( $item->subaccounts, new AccCapitalSubAccountTransformer() );
	}


}
