<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInventoryTable extends Migration {

	public function up()
	{
		Schema::create('acc_inventory', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->integer('user_id')->nullable();
			$table->enum('status', array('active', 'inactive'));
		});
	}

	public function down()
	{
		Schema::drop('acc_inventory');
	}
}