<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccSpecialAccountTable extends Migration {

	public function up()
	{
		Schema::create('acc_special_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->integer('currency_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('balance_sheet_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->double('starting_balance')->nullable();
			$table->enum('balance_type', array('debit', 'credit'))->nullable();
			$table->enum('status', array('active', 'inacrive'))->nullable();
			$table->double('balance')->nullable();
			$table->integer('account_category_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_special_account');
	}
}