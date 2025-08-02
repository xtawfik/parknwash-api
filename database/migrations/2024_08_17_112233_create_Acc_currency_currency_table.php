<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCurrencyCurrencyTable extends Migration {

	public function up()
	{
		Schema::create('Acc_currency_currency', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('currency_id')->nullable();
			$table->integer('currency_revaluation_id')->nullable();
			$table->double('realized_gain')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Acc_currency_currency');
	}
}