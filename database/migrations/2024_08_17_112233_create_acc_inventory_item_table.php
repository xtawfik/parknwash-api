<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccInventoryItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_inventory_item', function(Blueprint $table) {
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
			$table->string('divison_place_id')->nullable();
			$table->integer('control_account_id')->nullable();
			$table->integer('production_stage')->nullable();
			$table->integer('quantity_desired')->nullable();
			$table->boolean('receive')->nullable();
			$table->boolean('deliver')->nullable();
			$table->integer('income_account_id')->nullable();
			$table->integer('expense_account_id')->nullable();
			$table->text('description_en')->nullable();
			$table->string('description_ar')->nullable();
			$table->double('purchase_price')->nullable();
			$table->double('unit_price')->nullable();
			$table->integer('sales_division_id')->nullable();
			$table->integer('sales_place_id')->nullable();
			$table->integer('sales_division_place_id')->nullable();
			$table->integer('tax_code_id')->nullable();
			$table->boolean('hide_name')->nullable();
			$table->double('average_cost')->nullable();
			$table->integer('total_quantity')->nullable();
			$table->integer('quantity_on_hand')->nullable();
			$table->integer('quantity_to_deliver')->nullable();
			$table->integer('quantity_available')->nullable();
			$table->integer('quantity_to_receive')->nullable();
			$table->integer('quantity_be_available')->nullable();
			$table->integer('quantity_to_order')->nullable();
			$table->integer('obsolete_quantity_to_receive')->nullable();
			$table->integer('obsolete_quantity_to_deliver')->nullable();
			$table->integer('obsolete_quantity_on_hand')->nullable();
			$table->integer('quantity_owned')->nullable();
			$table->double('total_cost')->nullable();
			$table->integer('user_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('sales_price')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_inventory_item');
	}
}