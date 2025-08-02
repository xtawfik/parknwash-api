<?php

namespace App\Containers\AccPayslip\UI\API\Transformers;

use App\Containers\AccPayslip\Models\AccPayslip;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\AccEmployee\UI\API\Transformers\AccEmployeeTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccPayslipEarning\UI\API\Transformers\AccPayslipEarningTransformer;
use App\Containers\AccPayslipDeduction\UI\API\Transformers\AccPayslipDeductionTransformer;
use App\Containers\AccPayslipContribution\UI\API\Transformers\AccPayslipContributionTransformer;


class AccPayslipTransformer extends Transformer
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
'acc_employee',
'footer',
'earnings',
'deductions',
'contribution',

    ];

    /**
     * @param AccPayslip $entity
     *
     * @return array
     */
    public function transform(AccPayslip $entity)
    {
        $response = [
            'object' => 'AccPayslip',
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

    	public function includeUser( AccPayslip $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeEmployee( AccPayslip $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeAccEmployee( AccPayslip $item ) {
		return $this->item( $item->acc_employee, new AccEmployeeTransformer() );
	}

	public function includeFooter( AccPayslip $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeEarnings( AccPayslip $item ) {
		return $this->collection( $item->earnings, new AccPayslipEarningTransformer() );
	}

	public function includeDeductions( AccPayslip $item ) {
		return $this->collection( $item->deductions, new AccPayslipDeductionTransformer() );
	}

	public function includeContribution( AccPayslip $item ) {
		return $this->collection( $item->contribution, new AccPayslipContributionTransformer() );
	}


}
