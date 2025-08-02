<?php

namespace App\Containers\AccCustomer\UI\API\Transformers;

use App\Containers\AccCustomer\Models\AccCustomer;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;


class AccCustomerTransformer extends Transformer
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
'division',
'control_account',
'place',
'division_place',
'currency',

    ];

    /**
     * @param AccCustomer $entity
     *
     * @return array
     */
    public function transform(AccCustomer $entity)
    {
        $response = [
            'object' => 'AccCustomer',
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

    	public function includeUser( AccCustomer $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeDivision( AccCustomer $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeControlAccount( AccCustomer $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includePlace( AccCustomer $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccCustomer $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeCurrency( AccCustomer $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}


}
