<?php

namespace App\Containers\AccBankRule\UI\API\Transformers;

use App\Containers\AccBankRule\Models\AccBankRule;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;


class AccBankRuleTransformer extends Transformer
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
'bank_account',
'customer',
'supplier',

    ];

    /**
     * @param AccBankRule $entity
     *
     * @return array
     */
    public function transform(AccBankRule $entity)
    {
        $response = [
            'object' => 'AccBankRule',
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

    	public function includeItems( AccBankRule $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}

	public function includeUser( AccBankRule $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBankAccount( AccBankRule $item ) {
		return $this->item( $item->bank_account, new AccBankAccountTransformer() );
	}

	public function includeCustomer( AccBankRule $item ) {
		return $this->item( $item->customer, new AccCustomerTransformer() );
	}

	public function includeSupplier( AccBankRule $item ) {
		return $this->item( $item->supplier, new AccSupplierTransformer() );
	}


}
