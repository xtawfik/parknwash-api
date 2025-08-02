<?php

namespace App\Containers\AccPayslipDeduction\UI\API\Transformers;

use App\Containers\AccPayslipDeduction\Models\AccPayslipDeduction;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPayslipItem\UI\API\Transformers\AccPayslipItemTransformer;
use App\Containers\AccPayslip\UI\API\Transformers\AccPayslipTransformer;
use App\Containers\AccRecurringTransaction\UI\API\Transformers\AccRecurringTransactionTransformer;


class AccPayslipDeductionTransformer extends Transformer
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
'division_place',
'place_id',
'division_id',
'payslip_item',
'payslip',
'recurring_transaction',

    ];

    /**
     * @param AccPayslipDeduction $entity
     *
     * @return array
     */
    public function transform(AccPayslipDeduction $entity)
    {
        $response = [
            'object' => 'AccPayslipDeduction',
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

    	public function includeUser( AccPayslipDeduction $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeDivisionPlace( AccPayslipDeduction $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includePlaceId( AccPayslipDeduction $item ) {
		return $this->item( $item->place_id, new AccPlaceTransformer() );
	}

	public function includeDivisionId( AccPayslipDeduction $item ) {
		return $this->item( $item->division_id, new AccDivisionTransformer() );
	}

	public function includePayslipItem( AccPayslipDeduction $item ) {
		return $this->item( $item->payslip_item, new AccPayslipItemTransformer() );
	}

	public function includePayslip( AccPayslipDeduction $item ) {
		return $this->item( $item->payslip, new AccPayslipTransformer() );
	}

	public function includeRecurringTransaction( AccPayslipDeduction $item ) {
		return $this->item( $item->recurring_transaction, new AccRecurringTransactionTransformer() );
	}


}
