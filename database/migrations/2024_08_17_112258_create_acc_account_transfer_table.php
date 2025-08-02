<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccAccountTransferTable extends Migration {

	public function up()
	{
		Schema::create('acc_account_transfer', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('refrence')->nullable();
			$table->text('description')->nullable();
			$table->integer('paid_from_bank_account_id')->nullable();
			$table->double('amount')->nullable();
			$table->integer('received_in_bank_account_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->enum('cleared_type', array('on_same_date', 'on_later_date'))->nullable();
			$table->datetime('cleared_at')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_account_transfer');
	}
}