<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccExpenseClaimTable extends Migration {

	public function up()
	{
		Schema::create('acc_expense_claim', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->integer('paid_by_id')->nullable();
			$table->integer('capital_account_id')->nullable();
			$table->string('payee')->nullable();
			$table->integer('currency_id')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->integer('footer_id')->nullable();
			$table->enum('paid_by_type', array('payer', 'account'))->nullable();
			$table->integer('inventory_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_expense_claim');
	}
}