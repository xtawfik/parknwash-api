<?php

namespace App\Containers\AccItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccItemRepository
 */
class AccItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'type' => 'like',
'name' => 'like',
'receipt_id' => '=',
'balance_sheet_account_id' => '=',
'profit_loss_account_id' => '=',
'show_quantity' => 'like',
'quantity' => 'like',
'unit_price' => 'like',
'total' => 'like',
'division_id' => '=',
'amount' => 'like',
'description' => 'like',
'show_discount' => '=',
'discount_type' => '=',
'discount' => '=',
'cost_goods_type' => 'like',
'cost_goods_price' => 'like',
'place_id' => '=',
'division_place_id' => '=',
'expense_claim_id' => '=',
'sales_quote_id' => '=',
'sales_order_id' => '=',
'sales_invoice_id' => '=',
'inventory_item_id' => '=',
'payment_id' => '=',
'request_for_quotation' => '=',
'purchase_quote_id' => '=',
'purchase_order_id' => '=',
'purchase_invoice_id' => '=',
'debit_note_id' => '=',
'goods_receipt_id' => '=',
'project_id' => '=',
'inventory_id' => '=',
'journal_entry_id' => '=',
'journal_depit' => 'like',
'journal_credit' => 'like',
'capitalsub_account_id' => '=',
'capital_account_id' => '=',
'control_account_id' => '=',
'special_account_id' => '=',
'forecast_id' => '=',
'recurring_transaction_id' => '=',
'bank_rule_id' => '=',
'non_inventory_item_id' => '=',
'inventory_kit_id' => '=',
'tax_code_id' => '=',
'employee_id' => '=',
'tax_amount' => 'like',
'sales_price' => 'like',
'show_price_unit' => 'like',
'show_tax_amount' => 'like',
'total_after_tax' => 'like',
'tax_inclusive' => 'like',
'account_type' => '=',

    ];

}
