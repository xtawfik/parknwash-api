<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccBankAccountTable extends Migration {

	public function up()
	{
		Schema::create('acc_bank_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->integer('currency_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->double('starting_balance')->nullable();
			$table->string('iban')->nullable();
			$table->boolean('have_pending_transaction')->nullable();
			$table->double('credit_limit')->nullable();
			$table->enum('status', array('activie', 'inactive'))->nullable();
			$table->integer('uncategorized_receipt')->nullable();
			$table->integer('uncategorized_payment')->nullable();
			$table->double('cleared_balance')->nullable();
			$table->double('pending_deposit')->nullable();
			$table->double('pending_withdrawal')->nullable();
			$table->double('actual_balance')->nullable();
			$table->datetime('last_bank_reconciliation')->nullable();
			$table->double('available_credit')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_bank_account');
	}
}