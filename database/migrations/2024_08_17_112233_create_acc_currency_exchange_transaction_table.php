<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCurrencyExchangeTransactionTable extends Migration {

	public function up()
	{
		Schema::create('acc_currency_exchange_transaction', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->double('base_amount')->nullable();
			$table->double('exchange_amount')->nullable();
			$table->integer('currency_exchange_id')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_currency_exchange_transaction');
	}
}