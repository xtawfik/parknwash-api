<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccProfitLossAccountTable extends Migration {

	public function up()
	{
		Schema::create('acc_profit_loss_account', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->integer('profit_loss_id')->nullable();
			$table->integer('cash_flow_type_id')->nullable();
			$table->integer('cash_flow_id')->nullable();
			$table->text('description')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('account_category_id')->nullable();
			$table->integer('tax_code_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_profit_loss_account');
	}
}