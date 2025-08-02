<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccControlAccountTable extends Migration {

	public function up()
	{
		Schema::create('acc_control_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->integer('balance_sheet_id')->nullable();
			$table->integer('control_type_id')->nullable();
			$table->integer('cash_flow_type_id')->nullable();
			$table->integer('cash_flow_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('account_category_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_control_account');
	}
}