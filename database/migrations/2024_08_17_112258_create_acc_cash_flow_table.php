<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCashFlowTable extends Migration {

	public function up()
	{
		Schema::create('acc_cash_flow', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('cash_flow_type_id')->nullable();
			$table->string('name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_cash_flow');
	}
}