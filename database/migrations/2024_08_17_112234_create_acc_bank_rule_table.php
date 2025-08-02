<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccBankRuleTable extends Migration {

	public function up()
	{
		Schema::create('acc_bank_rule', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('user_id')->nullable();
			$table->enum('type', array('payment', 'receipt'))->nullable();
			$table->integer('bank_account_id')->nullable();
			$table->double('amount')->nullable();
			$table->enum('amount_type', array('any_amount_exactly', 'more', 'less'))->nullable();
			$table->string('description')->nullable();
			$table->enum('paid_by_type', array('other', 'customer', 'supplier'))->nullable();
			$table->string('other_name')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('supplier_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_bank_rule');
	}
}