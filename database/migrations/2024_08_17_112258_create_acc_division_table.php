<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccDivisionTable extends Migration {

	public function up()
	{
		Schema::create('acc_division', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->integer('user_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_division');
	}
}