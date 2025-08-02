<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPayslipItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_payslip_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('balance_sheet_acount_id')->nullable();
			$table->integer('profit_loss_account_id')->nullable();
			$table->integer('reporting_category_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_payslip_item');
	}
}