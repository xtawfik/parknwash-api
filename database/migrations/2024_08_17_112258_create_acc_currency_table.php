<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCurrencyTable extends Migration {

	public function up()
	{
		Schema::create('acc_currency', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->string('symbols_en')->nullable();
			$table->string('symbols_ar')->nullable();
			$table->enum('type', array('base', 'foreign'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_currency');
	}
}