<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccForecastTable extends Migration {

	public function up()
	{
		Schema::create('acc_forecast', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->enum('repeat', array('never', 'every_day', 'every_week', 'every_2weeks', 'every_month', 'every_2months', 'every_3months', 'every_6months', 'every_year'))->nullable();
			$table->string('description')->nullable();
			$table->double('amount')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('growth')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_forecast');
	}
}