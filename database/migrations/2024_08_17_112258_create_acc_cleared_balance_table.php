<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccClearedBalanceTable extends Migration {

	public function up()
	{
		Schema::create('acc_cleared_balance', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->integer('transaction_id')->nullable();
			$table->integer('bank_account_id')->nullable();
			$table->double('balance')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_cleared_balance');
	}
}