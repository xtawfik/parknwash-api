<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccProjectTable extends Migration {

	public function up()
	{
		Schema::create('acc_project', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->double('income')->nullable();
			$table->double('direct_cost')->nullable();
			$table->double('profit')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('user_id')->nullable();
			$table->string('code')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_project');
	}
}