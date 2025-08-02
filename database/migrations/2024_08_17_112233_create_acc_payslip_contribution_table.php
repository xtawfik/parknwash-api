<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPayslipContributionTable extends Migration {

	public function up()
	{
		Schema::create('acc_payslip_contribution', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('payslip_id')->nullable();
			$table->integer('payslip_item_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->string('description')->nullable();
			$table->double('amount')->nullable();
			$table->integer('recurring_transaction_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_payslip_contribution');
	}
}