<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCustomerTable extends Migration {

	public function up()
	{
		Schema::create('acc_customer', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->double('credit_limit')->nullable();
			$table->integer('currency_id')->nullable();
			$table->text('billing_address')->nullable();
			$table->text('delivery_address')->nullable();
			$table->string('email')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->double('available_credit')->nullable();
			$table->double('total_available_credit')->nullable();
			$table->integer('receipt')->nullable();
			$table->integer('payment')->nullable();
			$table->integer('sales_quote')->nullable();
			$table->integer('sales_order')->nullable();
			$table->integer('sales_invoice')->nullable();
			$table->integer('credit_note')->nullable();
			$table->integer('delivery_note')->nullable();
			$table->integer('quantity_delivery')->nullable();
			$table->integer('quantity_invoice')->nullable();
			$table->double('univoiced')->nullable();
			$table->double('account_receivable')->nullable();
			$table->double('withholding_tax')->nullable();
			$table->enum('money_status', array('paid', 'overpaid', 'unpaid'))->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->double('starting_balance')->nullable();
			$table->boolean('autofill_sales_invoice')->nullable();
			$table->boolean('autofill_billable_time')->nullable();
			$table->integer('billable_time_hourly_rate')->nullable();
			$table->integer('sales_invoice_due_date')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_customer');
	}
}