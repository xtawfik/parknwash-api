<?php

namespace App\Containers\AccBillableTime\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccBillableTimeRepository
 */
class AccBillableTimeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'description' => 'like',
'time_spent' => 'like',
'customer_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'sales_invoice_id' => '=',
'amount' => 'like',
'status' => '=',
'hourly_rate' => '=',
'written_off_date' => '=',
'user_id' => '=',

    ];

}
