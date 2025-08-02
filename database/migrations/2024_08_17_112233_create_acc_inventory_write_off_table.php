<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInventoryWriteOffTable extends Migration {

	public function up()
	{
		Schema::create('acc_inventory_write_off', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->integer('balance_sheet_account_id')->nullable();
			$table->integer('profit_loss_account_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('project_id')->nullable();
			$table->integer('total')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('tax_code_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_inventory_write_off');
	}
}