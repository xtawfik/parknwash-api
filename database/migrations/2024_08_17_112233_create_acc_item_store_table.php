<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccItemStoreTable extends Migration {

	public function up()
	{
		Schema::create('acc_item_store', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('inventory_item_id')->nullable();
			$table->integer('quantity')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->integer('inventory_transfer_id')->nullable();
			$table->integer('inventory_write_off_id')->nullable();
			$table->integer('production_order_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('average_cost')->nullable();
			$table->text('description')->nullable();
			$table->integer('inventory_kit_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_item_store');
	}
}