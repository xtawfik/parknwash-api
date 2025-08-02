<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccSupplierTable extends Migration {

	public function up()
	{
		Schema::create('acc_supplier', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->string('email')->nullable();
			$table->double('credit_limit')->nullable();
			$table->integer('currency_id')->nullable();
			$table->text('address')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->double('available_credit')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('account_payable')->nullable();
			$table->enum('money_status', array('paid', 'overpaid', 'unpaid'))->nullable();
			$table->integer('user_id')->nullable();
			$table->double('accounts_payable')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_supplier');
	}
}