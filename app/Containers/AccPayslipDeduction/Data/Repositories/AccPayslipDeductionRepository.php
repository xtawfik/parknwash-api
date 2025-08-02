<?php

namespace App\Containers\AccPayslipDeduction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPayslipDeductionRepository
 */
class AccPayslipDeductionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'payslip_id' => '=',
'payslip_item_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'description' => 'like',
'amount' => 'like',
'recurring_transaction_id' => '=',

    ];

}
