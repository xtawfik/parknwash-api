<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccLockDateTable extends Migration {

	public function up()
	{
		Schema::create('acc_lock_date', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->boolean('lock_accounting_period')->nullable();
			$table->datetime('date')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_lock_date');
	}
}