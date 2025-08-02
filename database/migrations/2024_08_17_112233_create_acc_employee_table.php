<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccEmployeeTable extends Migration {

	public function up()
	{
		Schema::create('acc_employee', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('employee_id')->nullable();
			$table->integer('currency_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->text('address')->nullable();
			$table->enum('starting_balance_type', array('paid_in_advanced', 'amount_to_pay'))->nullable();
			$table->double('starting_balance')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_employee');
	}
}