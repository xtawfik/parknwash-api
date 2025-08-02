<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCurrencyExchangeTable extends Migration {

	public function up()
	{
		Schema::create('acc_currency_exchange', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->integer('currency_id')->nullable();
			$table->integer('rate')->nullable();
			$table->double('transaction')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_currency_exchange');
	}
}