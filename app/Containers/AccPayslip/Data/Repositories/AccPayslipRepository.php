<?php

namespace App\Containers\AccPayslip\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPayslipRepository
 */
class AccPayslipRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'employee_id' => '=',
'acc_employee_id' => '=',
'footer_id' => '=',
'date' => '=',
'description' => 'like',
'refrence' => 'like',
'show_total' => 'like',
'title' => 'like',
'from_date' => '=',
'gross_pay' => 'like',
'deduction' => 'like',
'net_pay' => 'like',
'contribution' => 'like',

    ];

}
