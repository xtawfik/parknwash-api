<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInvestmentRevaluationItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_investment_revaluation_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('investment_id')->nullable();
			$table->double('realized_gain')->nullable();
			$table->integer('investment_revaluation_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_investment_revaluation_item');
	}
}