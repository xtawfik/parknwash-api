<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInvestmentRevaluationTable extends Migration {

	public function up()
	{
		Schema::create('acc_investment_revaluation', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->integer('fixed_asset_id')->nullable();
			$table->double('realized_gain')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_investment_revaluation');
	}
}