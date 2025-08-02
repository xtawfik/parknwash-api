<?php

namespace App\Containers\AccCustomer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCustomerRepository
 */
class AccCustomerRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'status' => '=',
'name' => 'like',
'code' => 'like',
'credit_limit' => 'like',
'currency_id' => '=',
'billing_address' => 'like',
'delivery_address' => 'like',
'email' => 'like',
'division_id' => '=',
'control_account_id' => '=',
'available_credit' => 'like',
'total_available_credit' => 'like',
'receipt' => 'like',
'payment' => 'like',
'sales_quote' => 'like',
'sales_order' => 'like',
'sales_invoice' => 'like',
'credit_note' => 'like',
'delivery_note' => 'like',
'quantity_delivery' => 'like',
'quantity_invoice' => 'like',
'univoiced' => 'like',
'account_receivable' => '=',
'withholding_tax' => 'like',
'money_status' => '=',
'place_id' => '=',
'division_place_id' => '=',
'starting_balance' => 'like',
'autofill_sales_invoice' => 'like',
'autofill_billable_time' => 'like',
'billable_time_hourly_rate' => '=',
'sales_invoice_due_date' => '=',

    ];

}
