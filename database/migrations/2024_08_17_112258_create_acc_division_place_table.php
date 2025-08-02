<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccDivisionPlaceTable extends Migration {

	public function up()
	{
		Schema::create('acc_division_place', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('place_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->string('name')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_division_place');
	}
}