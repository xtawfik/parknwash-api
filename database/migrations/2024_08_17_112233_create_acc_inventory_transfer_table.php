<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInventoryTransferTable extends Migration {

	public function up()
	{
		Schema::create('acc_inventory_transfer', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('date')->nullable();
			$table->string('reference')->nullable();
			$table->integer('from_inventory_id')->nullable();
			$table->integer('to_inventory_id')->nullable();
			$table->text('description')->nullable();
			$table->integer('total')->nullable();
			$table->integer('quantity')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_inventory_transfer');
	}
}