<?php

namespace App\Containers\AccPayslipEarning\UI\API\Transformers;

use App\Containers\AccPayslipEarning\Models\AccPayslipEarning;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccPayslip\UI\API\Transformers\AccPayslipTransformer;
use App\Containers\AccPayslipItem\UI\API\Transformers\AccPayslipItemTransformer;
use App\Containers\AccProject\UI\API\Transformers\AccProjectTransformer;
use App\Containers\AccRecurringTransaction\UI\API\Transformers\AccRecurringTransactionTransformer;


class AccPayslipEarningTransformer extends Transformer
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
'division',
'place',
'payslip',
'payslip_item',
'project',
'recurring_transaction',

    ];

    /**
     * @param AccPayslipEarning $entity
     *
     * @return array
     */
    public function transform(AccPayslipEarning $entity)
    {
        $response = [
            'object' => 'AccPayslipEarning',
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

    	public function includeUser( AccPayslipEarning $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeDivisionPlace( AccPayslipEarning $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeDivision( AccPayslipEarning $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includePlace( AccPayslipEarning $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includePayslip( AccPayslipEarning $item ) {
		return $this->item( $item->payslip, new AccPayslipTransformer() );
	}

	public function includePayslipItem( AccPayslipEarning $item ) {
		return $this->item( $item->payslip_item, new AccPayslipItemTransformer() );
	}

	public function includeProject( AccPayslipEarning $item ) {
		return $this->item( $item->project, new AccProjectTransformer() );
	}

	public function includeRecurringTransaction( AccPayslipEarning $item ) {
		return $this->item( $item->recurring_transaction, new AccRecurringTransactionTransformer() );
	}


}
