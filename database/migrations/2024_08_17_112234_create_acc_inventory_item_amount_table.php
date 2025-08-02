<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInventoryItemAmountTable extends Migration {

	public function up()
	{
		Schema::create('acc_inventory_item_amount', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('inventory_item_id')->nullable();
			$table->integer('quantity')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->text('description')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_inventory_item_amount');
	}
}