<?php

namespace App\Containers\AccItem\UI\API\Transformers;

use App\Containers\AccItem\Models\AccItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccReceipt\UI\API\Transformers\AccReceiptTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccSalesQuote\UI\API\Transformers\AccSalesQuoteTransformer;
use App\Containers\AccSalesOrder\UI\API\Transformers\AccSalesOrderTransformer;
use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;
use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccExpenseClaim\UI\API\Transformers\AccExpenseClaimTransformer;
use App\Containers\AccPayment\UI\API\Transformers\AccPaymentTransformer;
use App\Containers\AccPurchaseQuote\UI\API\Transformers\AccPurchaseQuoteTransformer;
use App\Containers\AccPurchaseOrder\UI\API\Transformers\AccPurchaseOrderTransformer;
use App\Containers\AccPurchaseInvoice\UI\API\Transformers\AccPurchaseInvoiceTransformer;
use App\Containers\AccDebitNote\UI\API\Transformers\AccDebitNoteTransformer;
use App\Containers\AccGoodsReceipt\UI\API\Transformers\AccGoodsReceiptTransformer;
use App\Containers\AccProject\UI\API\Transformers\AccProjectTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccJournalEntry\UI\API\Transformers\AccJournalEntryTransformer;
use App\Containers\AccCapitalSubAccount\UI\API\Transformers\AccCapitalSubAccountTransformer;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccSpecialAccount\UI\API\Transformers\AccSpecialAccountTransformer;
use App\Containers\AccForecast\UI\API\Transformers\AccForecastTransformer;
use App\Containers\AccRecurringTransaction\UI\API\Transformers\AccRecurringTransactionTransformer;
use App\Containers\AccBankRule\UI\API\Transformers\AccBankRuleTransformer;
use App\Containers\AccNonInventoryItem\UI\API\Transformers\AccNonInventoryItemTransformer;
use App\Containers\AccInventoryKit\UI\API\Transformers\AccInventoryKitTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;


class AccItemTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'user',
'receipt',
'profit_loss_account',
'division',
'sales_quote',
'sales_order',
'inventory_item',
'sales_invoice',
'balance_sheet_account',
'place',
'division_place',
'expense_claim',
'payment',
'purchase_quote',
'purchase_order',
'purchase_invoice',
'debit_note',
'goods_receipt',
'project',
'inventory',
'journal_entry',
'capitalsub_account',
'capital_account',
'control_account',
'special_account',
'forecast',
'recurring_transaction',
'bank_rule',
'non_inventory_item',
'inventory_kit',
'tax_code',
'employee',

    ];

    /**
     * @param AccItem $entity
     *
     * @return array
     */
    public function transform(AccItem $entity)
    {
        $response = [
            'object' => 'AccItem',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        // Get values of fillables
        $response = $this->fillables( $entity, $response );

        $response = $this->withMedia( $entity, $response, "image" );
        $response = $this->withMedia( $entity, $response, "gallery" );
        $response = $this->withMedia( $entity, $response, "file" );

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    	public function includeUser( AccItem $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeReceipt( AccItem $item ) {
		return $this->item( $item->receipt, new AccReceiptTransformer() );
	}

	public function includeProfitLossAccount( AccItem $item ) {
		return $this->item( $item->profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeDivision( AccItem $item ) {
		return $this->item( $item->division, new AccDivisionTransformer() );
	}

	public function includeSalesQuote( AccItem $item ) {
		return $this->item( $item->sales_quote, new AccSalesQuoteTransformer() );
	}

	public function includeSalesOrder( AccItem $item ) {
		return $this->item( $item->sales_order, new AccSalesOrderTransformer() );
	}

	public function includeInventoryItem( AccItem $item ) {
		return $this->item( $item->inventory_item, new AccInventoryItemTransformer() );
	}

	public function includeSalesInvoice( AccItem $item ) {
		return $this->item( $item->sales_invoice, new AccSalesInvoiceTransformer() );
	}

	public function includeBalanceSheetAccount( AccItem $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includePlace( AccItem $item ) {
		return $this->item( $item->place, new AccPlaceTransformer() );
	}

	public function includeDivisionPlace( AccItem $item ) {
		return $this->item( $item->division_place, new AccDivisionPlaceTransformer() );
	}

	public function includeExpenseClaim( AccItem $item ) {
		return $this->item( $item->expense_claim, new AccExpenseClaimTransformer() );
	}

	public function includePayment( AccItem $item ) {
		return $this->item( $item->payment, new AccPaymentTransformer() );
	}

	public function includePurchaseQuote( AccItem $item ) {
		return $this->item( $item->purchase_quote, new AccPurchaseQuoteTransformer() );
	}

	public function includePurchaseOrder( AccItem $item ) {
		return $this->item( $item->purchase_order, new AccPurchaseOrderTransformer() );
	}

	public function includePurchaseInvoice( AccItem $item ) {
		return $this->item( $item->purchase_invoice, new AccPurchaseInvoiceTransformer() );
	}

	public function includeDebitNote( AccItem $item ) {
		return $this->item( $item->debit_note, new AccDebitNoteTransformer() );
	}

	public function includeGoodsReceipt( AccItem $item ) {
		return $this->item( $item->goods_receipt, new AccGoodsReceiptTransformer() );
	}

	public function includeProject( AccItem $item ) {
		return $this->item( $item->project, new AccProjectTransformer() );
	}

	public function includeInventory( AccItem $item ) {
		return $this->item( $item->inventory, new AccInventoryTransformer() );
	}

	public function includeJournalEntry( AccItem $item ) {
		return $this->item( $item->journal_entry, new AccJournalEntryTransformer() );
	}

	public function includeCapitalsubAccount( AccItem $item ) {
		return $this->item( $item->capitalsub_account, new AccCapitalSubAccountTransformer() );
	}

	public function includeCapitalAccount( AccItem $item ) {
		return $this->item( $item->capital_account, new AccCapitalAccountTransformer() );
	}

	public function includeControlAccount( AccItem $item ) {
		return $this->item( $item->control_account, new AccControlAccountTransformer() );
	}

	public function includeSpecialAccount( AccItem $item ) {
		return $this->item( $item->special_account, new AccSpecialAccountTransformer() );
	}

	public function includeForecast( AccItem $item ) {
		return $this->item( $item->forecast, new AccForecastTransformer() );
	}

	public function includeRecurringTransaction( AccItem $item ) {
		return $this->item( $item->recurring_transaction, new AccRecurringTransactionTransformer() );
	}

	public function includeBankRule( AccItem $item ) {
		return $this->item( $item->bank_rule, new AccBankRuleTransformer() );
	}

	public function includeNonInventoryItem( AccItem $item ) {
		return $this->item( $item->non_inventory_item, new AccNonInventoryItemTransformer() );
	}

	public function includeInventoryKit( AccItem $item ) {
		return $this->item( $item->inventory_kit, new AccInventoryKitTransformer() );
	}

	public function includeTaxCode( AccItem $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}

	public function includeEmployee( AccItem $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}


}
