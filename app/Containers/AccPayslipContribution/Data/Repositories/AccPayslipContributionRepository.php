<?php

namespace App\Containers\AccPayslipContribution\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPayslipContributionRepository
 */
class AccPayslipContributionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'payslip_id' => '=',
'payslip_item_id' => '=',
'division_place_id' => '=',
'division_id' => '=',
'place_id' => '=',
'description' => 'like',
'amount' => 'like',
'recurring_transaction_id' => '=',

    ];

}
