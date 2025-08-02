<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInventoryKitTable extends Migration {

	public function up()
	{
		Schema::create('acc_inventory_kit', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('code')->nullable();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->string('unit_name_en')->nullable();
			$table->string('unit_name_ar')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->string('description')->nullable();
			$table->double('sales_price')->nullable();
			$table->integer('sales_division_id')->nullable();
			$table->integer('sales_division_place_id')->nullable();
			$table->integer('sales_place_id')->nullable();
			$table->integer('tax_code_id')->nullable();
			$table->integer('income_account_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('unit_price')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_inventory_kit');
	}
}