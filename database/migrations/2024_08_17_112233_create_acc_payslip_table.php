<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPayslipTable extends Migration {

	public function up()
	{
		Schema::create('acc_payslip', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('user_id')->nullable();
			$table->integer('employee_id')->nullable();
			$table->integer('acc_employee_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->datetime('date')->nullable();
			$table->text('description')->nullable();
			$table->string('refrence')->nullable();
			$table->boolean('show_total')->nullable();
			$table->string('title')->nullable();
			$table->datetime('from_date')->nullable();
			$table->double('gross_pay')->nullable();
			$table->double('deduction')->nullable();
			$table->double('net_pay')->nullable();
			$table->double('contribution')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_payslip');
	}
}