<?php

namespace App\Containers\AccPayslipContribution\UI\API\Transformers;

use App\Containers\AccPayslipContribution\Models\AccPayslipContribution;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccPayslip\UI\API\Transformers\AccPayslipTransformer;
use App\Containers\AccPayslipItem\UI\API\Transformers\AccPayslipItemTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccRecurringTransaction\UI\API\Transformers\AccRecurringTransactionTransformer;


class AccPayslipContributionTransformer extends Transformer
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
'payslip',
'payslip_item',
'division_place',
'place',
'division_id',
'recurring_transaction',

    ];

    /**
     * @param AccPayslipContribution $entity
     *
     * @return array
     */
    public function transform(AccPayslipContribution $entity)
    {
        $response = [
            'object' => 'AccPayslipContribution',
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

    	public function includeUser( AccPayslipContribution $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includePayslip( AccPayslipContribution $item ) {
		return $this->item( $item->payslip, new AccPayslipTransformer() );
	}

	public function includePayslipItem( AccPayslipContribution $item ) {
		return $this->item( $item->payslip_item, new AccPayslipItemTransformer() );
	}

	public function includeDivisionPlace( AccPayslipContribution $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includePlace( AccPayslipContribution $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionId( AccPayslipContribution $item ) {
		return $this->item( $item->division_id, new AccDivisionTransformer() );
	}

	public function includeRecurringTransaction( AccPayslipContribution $item ) {
		return $this->item( $item->recurring_transaction, new AccRecurringTransactionTransformer() );
	}


}
