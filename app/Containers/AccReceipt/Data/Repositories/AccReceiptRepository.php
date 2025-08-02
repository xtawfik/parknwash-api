<?php

namespace App\Containers\AccReceipt\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccReceiptRepository
 */
class AccReceiptRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'reference' => 'like',
'paid_by_type' => '=',
'other_name' => 'like',
'customer_id' => '=',
'supplier_id' => '=',
'bank_account_id' => '=',
'description' => 'like',
'total' => 'like',
'fixed_total' => 'like',
'sales_invoice_id' => '=',
'out_of_balance' => 'like',
'amount' => 'like',
'title' => 'like',
'footer_id' => '=',
'cleared_at' => '=',
'inventory_id' => '=',

    ];

}
