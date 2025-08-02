<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccProductionCostTable extends Migration {

	public function up()
	{
		Schema::create('acc_production_cost', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('balance_sheet_account_id')->nullable();
			$table->integer('profit_loss_accoun_id')->nullable();
			$table->double('amount')->nullable();
			$table->integer('production_order_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_production_cost');
	}
}