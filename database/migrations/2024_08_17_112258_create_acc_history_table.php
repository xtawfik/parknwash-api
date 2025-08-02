<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccHistoryTable extends Migration {

	public function up()
	{
		Schema::create('acc_history', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->enum('action', array('create', 'update', 'delete'))->nullable();
			$table->text('description')->nullable();
			$table->string('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_history');
	}
}