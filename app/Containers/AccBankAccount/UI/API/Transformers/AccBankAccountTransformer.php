<?php

namespace App\Containers\AccBankAccount\UI\API\Transformers;

use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccReceipt\UI\API\Transformers\AccReceiptTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccPayment\UI\API\Transformers\AccPaymentTransformer;


class AccBankAccountTransformer extends Transformer
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
'receipts',
'division',
'control_account',
'place',
'division_place',
'currency',
'payments',

    ];

    /**
     * @param AccBankAccount $entity
     *
     * @return array
     */
    public function transform(AccBankAccount $entity)
    {
        $response = [
            'object' => 'AccBankAccount',
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

    	public function includeUser( AccBankAccount $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeReceipts( AccBankAccount $item ) {
		return $this->collection( $item->receipts, new AccReceiptTransformer() );
	}

	public function includeDivision( AccBankAccount $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeControlAccount( AccBankAccount $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includePlace( AccBankAccount $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccBankAccount $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeCurrency( AccBankAccount $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includePayments( AccBankAccount $item ) {
		return $this->collection( $item->payments, new AccPaymentTransformer() );
	}


}
