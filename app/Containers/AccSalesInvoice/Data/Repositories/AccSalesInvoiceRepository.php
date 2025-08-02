<?php

namespace App\Containers\AccSalesInvoice\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccSalesInvoiceRepository
 */
class AccSalesInvoiceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'status' => '=',
'user_id' => '=',
'footer_id' => '=',
'customer_id' => '=',
'date' => '=',
'due_date' => '=',
'due_type' => 'like',
'reference' => 'like',
'billing_address' => 'like',
'description' => 'like',
'amount' => 'like',
'title' => 'like',
'sub_total' => 'like',
'withholding_tax' => 'like',
'total' => 'like',
'cancelled' => 'like',
'show_item_image' => 'like',
'hide_total' => '=',
'withholding_tax_type' => 'like',
'day' => 'like',
'early_payment_discount' => '=',
'early_payment_discount_type' => '=',
'early_payment_discount_number' => '=',
'if_paid_within_day' => '=',
'late_payment_fee' => '=',
'charge_monthly' => 'like',
'invoice_amount' => 'like',
'balance_due' => 'like',
'days_to_due_date' => '=',
'days_overdue' => 'like',
'sales_quote_id' => '=',
'sales_order_id' => '=',
'inventory_id' => '=',
'money_staus' => 'like',

    ];

}
