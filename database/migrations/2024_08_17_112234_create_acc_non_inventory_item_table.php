<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccNonInventoryItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_non_inventory_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->string('name_ar')->nullable();
			$table->string('name_en')->nullable();
			$table->string('unit_name_en')->nullable();
			$table->string('unit_name_ar')->nullable();
			$table->integer('sold_balance_sheet_account_id')->nullable();
			$table->integer('purchased_balance_sheet_account_id')->nullable();
			$table->integer('sold_profit_loss_account_id')->nullable();
			$table->integer('purchased_profit_loss_account_id')->nullable();
			$table->string('description')->nullable();
			$table->double('sales_price')->nullable();
			$table->double('purchase_price')->nullable();
			$table->integer('tax_code_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('unit_price')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_non_inventory_item');
	}
}