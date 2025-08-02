<?php

namespace App\Containers\AccPayslipEarning\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPayslipEarningRepository
 */
class AccPayslipEarningRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'payslip_id' => '=',
'payslip_item_id' => '=',
'place_id' => '=',
'division_id' => '=',
'division_place_id' => '=',
'project_id' => '=',
'description' => 'like',
'unit_number' => 'like',
'unit_price' => 'like',
'amount' => 'like',
'recurring_transaction_id' => '=',

    ];

}
