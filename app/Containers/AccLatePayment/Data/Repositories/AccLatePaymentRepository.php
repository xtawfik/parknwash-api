<?php

namespace App\Containers\AccLatePayment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccLatePaymentRepository
 */
class AccLatePaymentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'customer_id' => '=',
'sales_invoice_id' => '=',
'amount' => 'like',

    ];

}
