<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPayslipEarningTable extends Migration {

	public function up()
	{
		Schema::create('acc_payslip_earning', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('payslip_id')->nullable();
			$table->integer('payslip_item_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('project_id')->nullable();
			$table->string('description')->nullable();
			$table->integer('unit_number')->nullable();
			$table->double('unit_price')->nullable();
			$table->double('amount')->nullable();
			$table->integer('recurring_transaction_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_payslip_earning');
	}
}