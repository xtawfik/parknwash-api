<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->enum('type', array('inventory_item', 'non_inventory_item', 'inventory_kit', 'freight_in', 'other'))->nullable();
			$table->string('name')->nullable();
			$table->integer('receipt_id')->nullable();
			$table->integer('balance_sheet_account_id')->nullable();
			$table->integer('profit_loss_account_id')->nullable();
			$table->boolean('show_quantity')->nullable();
			$table->integer('quantity')->nullable();
			$table->double('unit_price')->nullable();
			$table->double('total')->nullable();
			$table->integer('division_id')->nullable();
			$table->double('amount')->nullable();
			$table->text('description')->nullable();
			$table->boolean('show_discount')->nullable();
			$table->enum('discount_type', array('percentage', 'exact_amount'))->nullable();
			$table->double('discount')->nullable();
			$table->enum('cost_goods_type', array('manual', 'automatic'))->nullable();
			$table->double('cost_goods_price')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('expense_claim_id')->nullable();
			$table->integer('sales_quote_id')->nullable();
			$table->integer('sales_order_id')->nullable();
			$table->integer('sales_invoice_id')->nullable();
			$table->integer('inventory_item_id')->nullable();
			$table->integer('payment_id')->nullable();
			$table->boolean('request_for_quotation')->nullable();
			$table->integer('purchase_quote_id')->nullable();
			$table->integer('purchase_order_id')->nullable();
			$table->integer('purchase_invoice_id')->nullable();
			$table->integer('debit_note_id')->nullable();
			$table->integer('goods_receipt_id')->nullable();
			$table->integer('project_id')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->integer('journal_entry_id')->nullable();
			$table->double('journal_depit')->nullable();
			$table->double('journal_credit')->nullable();
			$table->integer('capitalsub_account_id')->nullable();
			$table->integer('capital_account_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->integer('special_account_id')->nullable();
			$table->integer('forecast_id')->nullable();
			$table->integer('recurring_transaction_id')->nullable();
			$table->integer('bank_rule_id')->nullable();
			$table->integer('non_inventory_item_id')->nullable();
			$table->integer('inventory_kit_id')->nullable();
			$table->integer('tax_code_id')->nullable();
			$table->integer('employee_id')->nullable();
			$table->double('tax_amount')->nullable();
			$table->double('sales_price')->nullable();
			$table->boolean('show_price_unit')->nullable();
			$table->boolean('show_tax_amount')->nullable();
			$table->double('total_after_tax')->nullable();
			$table->boolean('tax_inclusive')->nullable();
			$table->enum('account_type', array('balance', 'profit_loss', 'control', 'capital', 'special'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_item');
	}
}