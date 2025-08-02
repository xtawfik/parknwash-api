<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCurrencyRevaluationItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_currency_revaluation_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('currency_revaluation_id')->nullable();
			$table->integer('profit_loss_account_id')->nullable();
			$table->integer('balance_sheet_account_id')->nullable();
			$table->double('gain_loss_value')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->text('description')->nullable();
			$table->integer('special_account_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->string('employee_id')->nullable();
			$table->integer('bank_account_id')->nullable();
			$table->integer('capital_account_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_currency_revaluation_item');
	}
}