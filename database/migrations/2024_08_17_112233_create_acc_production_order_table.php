<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccProductionOrderTable extends Migration {

	public function up()
	{
		Schema::create('acc_production_order', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->integer('finished_item_id')->nullable();
			$table->integer('quantity')->nullable();
			$table->enum('status', array('pending', 'completed'))->nullable();
			$table->boolean('production_cost')->nullable();
			$table->double('total')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_production_order');
	}
}