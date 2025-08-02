<?php

namespace App\Containers\AccExpenseClaimPayers\UI\API\Transformers;

use App\Containers\AccExpenseClaimPayers\Models\AccExpenseClaimPayers;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;


class AccExpenseClaimPayersTransformer extends Transformer
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
        'division',
'user',
'place',
'division_place',

    ];

    /**
     * @param AccExpenseClaimPayers $entity
     *
     * @return array
     */
    public function transform(AccExpenseClaimPayers $entity)
    {
        $response = [
            'object' => 'AccExpenseClaimPayers',
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

    	public function includeDivision( AccExpenseClaimPayers $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeUser( AccExpenseClaimPayers $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includePlace( AccExpenseClaimPayers $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccExpenseClaimPayers $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}


}
