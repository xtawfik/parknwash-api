<?php

namespace App\Containers\AccExpenseClaim\UI\API\Transformers;

use App\Containers\AccExpenseClaim\Models\AccExpenseClaim;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;
use App\Containers\AccExpenseClaimPayers\UI\API\Transformers\AccExpenseClaimPayersTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;


class AccExpenseClaimTransformer extends Transformer
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
'footer',
'capital_account',
'paid_by',
'items',
'currency',
'inventory',

    ];

    /**
     * @param AccExpenseClaim $entity
     *
     * @return array
     */
    public function transform(AccExpenseClaim $entity)
    {
        $response = [
            'object' => 'AccExpenseClaim',
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

    	public function includeUser( AccExpenseClaim $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeFooter( AccExpenseClaim $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeCapitalAccount( AccExpenseClaim $item ) {
		return $this->item( $item->capital_account, new AccCapitalAccountTransformer() );
	}

	public function includePaidBy( AccExpenseClaim $item ) {
		return $this->item( $item->paid_by, new AccExpenseClaimPayersTransformer() );
	}

	public function includeItems( AccExpenseClaim $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeCurrency( AccExpenseClaim $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeInventory( AccExpenseClaim $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}


}
