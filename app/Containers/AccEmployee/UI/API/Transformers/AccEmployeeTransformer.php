<?php

namespace App\Containers\AccEmployee\UI\API\Transformers;

use App\Containers\AccEmployee\Models\AccEmployee;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;


class AccEmployeeTransformer extends Transformer
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
'employee',
'currency',
'division',
'division_place',
'place',
'control_account',

    ];

    /**
     * @param AccEmployee $entity
     *
     * @return array
     */
    public function transform(AccEmployee $entity)
    {
        $response = [
            'object' => 'AccEmployee',
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

    	public function includeUser( AccEmployee $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeEmployee( AccEmployee $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeCurrency( AccEmployee $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeDivision( AccEmployee $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeDivisionPlace( AccEmployee $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includePlace( AccEmployee $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeControlAccount( AccEmployee $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}


}
