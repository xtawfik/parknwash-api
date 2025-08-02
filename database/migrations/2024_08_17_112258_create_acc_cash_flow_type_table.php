<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCashFlowTypeTable extends Migration {

	public function up()
	{
		Schema::create('acc_cash_flow_type', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_cash_flow_type');
	}
}