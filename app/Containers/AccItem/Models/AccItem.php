<?php

namespace App\Containers\AccItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccReceipt\Models\AccReceipt;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccSalesQuote\Models\AccSalesQuote;
use App\Containers\AccSalesOrder\Models\AccSalesOrder;
use App\Containers\AccInventoryItem\Models\AccInventoryItem;
use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccExpenseClaim\Models\AccExpenseClaim;
use App\Containers\AccPayment\Models\AccPayment;
use App\Containers\AccPurchaseQuote\Models\AccPurchaseQuote;
use App\Containers\AccPurchaseOrder\Models\AccPurchaseOrder;
use App\Containers\AccPurchaseInvoice\Models\AccPurchaseInvoice;
use App\Containers\AccDebitNote\Models\AccDebitNote;
use App\Containers\AccGoodsReceipt\Models\AccGoodsReceipt;
use App\Containers\AccProject\Models\AccProject;
use App\Containers\AccInventory\Models\AccInventory;
use App\Containers\AccJournalEntry\Models\AccJournalEntry;
use App\Containers\AccCapitalSubAccount\Models\AccCapitalSubAccount;
use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccSpecialAccount\Models\AccSpecialAccount;
use App\Containers\AccForecast\Models\AccForecast;
use App\Containers\AccRecurringTransaction\Models\AccRecurringTransaction;
use App\Containers\AccBankRule\Models\AccBankRule;
use App\Containers\AccNonInventoryItem\Models\AccNonInventoryItem;
use App\Containers\AccInventoryKit\Models\AccInventoryKit;
use App\Containers\AccTaxCode\Models\AccTaxCode;
use App\Containers\Employee\Models\Employee;


class AccItem extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'type',
		 'name',
		 'receipt_id',
		 'balance_sheet_account_id',
		 'profit_loss_account_id',
		 'show_quantity',
		 'quantity',
		 'unit_price',
		 'total',
		 'division_id',
		 'amount',
		 'description',
		 'show_discount',
		 'discount_type',
		 'discount',
		 'cost_goods_type',
		 'cost_goods_price',
		 'place_id',
		 'division_place_id',
		 'expense_claim_id',
		 'sales_quote_id',
		 'sales_order_id',
		 'sales_invoice_id',
		 'inventory_item_id',
		 'payment_id',
		 'request_for_quotation',
		 'purchase_quote_id',
		 'purchase_order_id',
		 'purchase_invoice_id',
		 'debit_note_id',
		 'goods_receipt_id',
		 'project_id',
		 'inventory_id',
		 'journal_entry_id',
		 'journal_depit',
		 'journal_credit',
		 'capitalsub_account_id',
		 'capital_account_id',
		 'control_account_id',
		 'special_account_id',
		 'forecast_id',
		 'recurring_transaction_id',
		 'bank_rule_id',
		 'non_inventory_item_id',
		 'inventory_kit_id',
		 'tax_code_id',
		 'employee_id',
		 'tax_amount',
		 'sales_price',
		 'show_price_unit',
		 'show_tax_amount',
		 'total_after_tax',
		 'tax_inclusive',
		 'account_type'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'accitems';
    protected $table = 'acc_item';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function receipt()
    {
        return $this->belongsTo(AccReceipt::class, 'receipt_id');
    }

    public function profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'profit_loss_account_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function sales_quote()
    {
        return $this->belongsTo(AccSalesQuote::class, 'sales_quote_id');
    }

    public function sales_order()
    {
        return $this->belongsTo(AccSalesOrder::class, 'sales_order_id');
    }

    public function inventory_item()
    {
        return $this->belongsTo(AccInventoryItem::class, 'inventory_item_id');
    }

    public function sales_invoice()
    {
        return $this->belongsTo(AccSalesInvoice::class, 'sales_invoice_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function expense_claim()
    {
        return $this->belongsTo(AccExpenseClaim::class, 'expense_claim_id');
    }

    public function payment()
    {
        return $this->belongsTo(AccPayment::class, 'payment_id');
    }

    public function purchase_quote()
    {
        return $this->belongsTo(AccPurchaseQuote::class, 'purchase_quote_id');
    }

    public function purchase_order()
    {
        return $this->belongsTo(AccPurchaseOrder::class, 'purchase_order_id');
    }

    public function purchase_invoice()
    {
        return $this->belongsTo(AccPurchaseInvoice::class, 'purchase_invoice_id');
    }

    public function debit_note()
    {
        return $this->belongsTo(AccDebitNote::class, 'debit_note_id');
    }

    public function goods_receipt()
    {
        return $this->belongsTo(AccGoodsReceipt::class, 'goods_receipt_id');
    }

    public function project()
    {
        return $this->belongsTo(AccProject::class, 'project_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }

    public function journal_entry()
    {
        return $this->belongsTo(AccJournalEntry::class, 'journal_entry_id');
    }

    public function capitalsub_account()
    {
        return $this->belongsTo(AccCapitalSubAccount::class, 'capitalsub_account_id');
    }

    public function capital_account()
    {
        return $this->belongsTo(AccCapitalAccount::class, 'capital_account_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function special_account()
    {
        return $this->belongsTo(AccSpecialAccount::class, 'special_account_id');
    }

    public function forecast()
    {
        return $this->belongsTo(AccForecast::class, 'forecast_id');
    }

    public function recurring_transaction()
    {
        return $this->belongsTo(AccRecurringTransaction::class, 'recurring_transaction_id');
    }

    public function bank_rule()
    {
        return $this->belongsTo(AccBankRule::class, 'bank_rule_id');
    }

    public function non_inventory_item()
    {
        return $this->belongsTo(AccNonInventoryItem::class, 'non_inventory_item_id');
    }

    public function inventory_kit()
    {
        return $this->belongsTo(AccInventoryKit::class, 'inventory_kit_id');
    }

    public function tax_code()
    {
        return $this->belongsTo(AccTaxCode::class, 'tac_code_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}

