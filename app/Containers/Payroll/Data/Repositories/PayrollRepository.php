<?php

namespace App\Containers\Payroll\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PayrollRepository
 */
class PayrollRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'account_id' => '=',
'month' => 'like',
'year' => 'like',
'employee_number' => 'like',
'total' => 'like',
'payment_date' => '=',
'description_en' => 'like',
'description_ar' => 'like',

    ];

}
