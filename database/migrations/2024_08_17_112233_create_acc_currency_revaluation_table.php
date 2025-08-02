<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCurrencyRevaluationTable extends Migration {

	public function up()
	{
		Schema::create('acc_currency_revaluation', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->double('total_item')->nullable();
			$table->double('total_gain')->nullable();
			$table->double('unrealized_gain')->nullable();
			$table->text('description')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_currency_revaluation');
	}
}