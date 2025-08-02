<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInvestmentTable extends Migration {

	public function up()
	{
		Schema::create('acc_investment', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('currency_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->string('code')->nullable();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->double('market_price')->nullable();
			$table->integer('quantity')->nullable();
			$table->double('total_cost')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('average_cost')->nullable();
			$table->double('market_value')->nullable();
			$table->double('unrealized_gain')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_investment');
	}
}