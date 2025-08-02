<?php

namespace App\Containers\AccPayment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPaymentRepository
 */
class AccPaymentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'reference' => 'like',
'description' => 'like',
'bank_account_id' => '=',
'amount' => 'like',
'paid_by_type' => '=',
'other_name' => 'like',
'customer_id' => '=',
'supplier_id' => '=',
'total' => 'like',
'fixed_total' => 'like',
'out_of_balance' => 'like',
'purchase_invoice_id' => '=',
'title' => 'like',
'footer_id' => '=',
'inventory_id' => '=',

    ];

}
