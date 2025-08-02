<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCapitalAccountTable extends Migration {

	public function up()
	{
		Schema::create('acc_capital_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('name')->nullable();
			$table->string('code')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->integer('division_id');
			$table->integer('division_place_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->enum('starting_balance_type', array('inadvance', 'topay'))->nullable();
			$table->double('starting_balance_amount')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('balance_sheet_id')->nullable();
			$table->double('balance')->nullable();
			$table->integer('account_category_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_capital_account');
	}
}