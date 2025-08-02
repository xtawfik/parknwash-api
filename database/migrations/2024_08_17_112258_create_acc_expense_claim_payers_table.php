<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccExpenseClaimPayersTable extends Migration {

	public function up()
	{
		Schema::create('acc_expense_claim_payers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->enum('balance_type', array('paid_advance', 'amount_pay'))->nullable();
			$table->double('starting_balance')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_expense_claim_payers');
	}
}