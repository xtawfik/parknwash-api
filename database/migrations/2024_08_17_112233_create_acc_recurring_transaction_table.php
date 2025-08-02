<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccRecurringTransactionTable extends Migration {

	public function up()
	{
		Schema::create('acc_recurring_transaction', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->integer('interval_duration')->nullable();
			$table->enum('interval_type', array('month', 'weeek', 'day'))->nullable();
			$table->integer('description')->nullable();
			$table->double('total')->nullable();
			$table->boolean('show_total')->nullable();
			$table->string('title')->nullable();
			$table->enum('until_type', array('notice', 'date'))->nullable();
			$table->datetime('until_date')->nullable();
			$table->double('amount')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('employee_id')->nullable();
			$table->integer('paid_from_bank_account_id')->nullable();
			$table->integer('received_in_bank_account_id')->nullable();
			$table->integer('currency_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->enum('paid_by_type', array('other', 'customer', 'supplier'))->nullable();
			$table->string('other_name')->nullable();
			$table->datetime('due_date')->nullable();
			$table->string('billing_address')->nullable();
			$table->integer('from_date')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_recurring_transaction');
	}
}