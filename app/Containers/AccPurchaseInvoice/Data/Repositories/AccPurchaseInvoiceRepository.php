<?php

namespace App\Containers\AccPurchaseInvoice\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPurchaseInvoiceRepository
 */
class AccPurchaseInvoiceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'status' => '=',
'user_id' => '=',
'footer_id' => '=',
'supplier_id' => '=',
'date' => '=',
'due_type' => 'like',
'due_date' => '=',
'day' => 'like',
'reference' => 'like',
'description' => 'like',
'title' => 'like',
'sub_total' => 'like',
'total' => 'like',
'withholding_tax_type' => 'like',
'withholding_tax' => 'like',
'closed_invoice' => 'like',
'show_item_image' => 'like',
'show_withholding_tax' => 'like',
'balance_due' => 'like',
'days_to_due_date' => '=',
'days_overdue' => 'like',
'sales_quote_id' => '=',
'sales_order_id' => '=',

    ];

}
