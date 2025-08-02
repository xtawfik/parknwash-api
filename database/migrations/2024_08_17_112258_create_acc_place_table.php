<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPlaceTable extends Migration {

	public function up()
	{
		Schema::create('acc_place', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_place');
	}
}