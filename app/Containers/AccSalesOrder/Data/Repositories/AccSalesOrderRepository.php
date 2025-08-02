<?php

namespace App\Containers\AccSalesOrder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccSalesOrderRepository
 */
class AccSalesOrderRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'footer_id' => '=',
'customer_id' => '=',
'sales_quote_id' => '=',
'date' => '=',
'reference' => 'like',
'description' => 'like',
'amount' => 'like',
'billing_address' => 'like',
'title' => 'like',
'status' => '=',
'sub_total' => 'like',
'withholding_tax' => 'like',
'total' => 'like',
'cancelled' => 'like',
'show_item_image' => 'like',
'hide_total' => '=',
'withholding_tax_type' => 'like',
'quantity_delivery' => 'like',
'delivery_status' => '=',
'invoice_amount' => 'like',
'invoice_status' => '=',
'sales_quotes' => 'like',
'closed_invoice' => 'like',

    ];

}
