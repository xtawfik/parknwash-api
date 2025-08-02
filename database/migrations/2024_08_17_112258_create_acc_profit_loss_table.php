<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccProfitLossTable extends Migration {

	public function up()
	{
		Schema::create('acc_profit_loss', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->enum('group_type', array('income', 'expense'))->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_profit_loss');
	}
}