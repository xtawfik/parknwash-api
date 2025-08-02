<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccSalesInvoiceTable extends Migration {

	public function up()
	{
		Schema::create('acc_sales_invoice', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->enum('status', array('full', 'over', 'due', 'non'))->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->datetime('date')->nullable();
			$table->datetime('due_date')->nullable();
			$table->enum('due_type', array('net', 'by'))->nullable();
			$table->string('reference')->nullable();
			$table->text('billing_address')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->string('title')->nullable();
			$table->double('sub_total')->nullable();
			$table->double('withholding_tax')->nullable();
			$table->double('total')->nullable();
			$table->boolean('cancelled')->nullable();
			$table->boolean('show_item_image')->nullable();
			$table->boolean('hide_total')->nullable();
			$table->enum('withholding_tax_type', array('amount', 'rate'))->nullable();
			$table->integer('day')->nullable();
			$table->double('early_payment_discount')->nullable();
			$table->enum('early_payment_discount_type', array('percentage', 'amount'))->nullable();
			$table->decimal('early_payment_discount_number')->nullable();
			$table->integer('if_paid_within_day')->nullable();
			$table->double('late_payment_fee')->nullable();
			$table->decimal('charge_monthly')->nullable();
			$table->double('invoice_amount')->nullable();
			$table->double('balance_due')->nullable();
			$table->integer('days_to_due_date')->nullable();
			$table->integer('days_overdue')->nullable();
			$table->integer('sales_quote_id')->nullable();
			$table->integer('sales_order_id')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->enum('money_staus', array('paid', 'overpaid', 'unpaid', 'partial', 'due_today', 'coming_due'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_sales_invoice');
	}
}