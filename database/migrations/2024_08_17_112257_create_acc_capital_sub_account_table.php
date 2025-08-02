<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCapitalSubAccountTable extends Migration {

	public function up()
	{
		Schema::create('acc_capital_sub_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->integer('balance_sheet_id')->nullable();
			$table->integer('profit_loss_id')->nullable();
			$table->integer('account_category_id')->nullable();
			$table->integer('capital_account_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_capital_sub_account');
	}
}