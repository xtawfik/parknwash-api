<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccReconciliationTable extends Migration {

	public function up()
	{
		Schema::create('acc_reconciliation', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->integer('bank_account_id')->nullable();
			$table->double('statement_balance')->nullable();
			$table->enum('status', array('reconciled', 'unreconciled'))->nullable();
			$table->double('discrepancy')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_reconciliation');
	}
}