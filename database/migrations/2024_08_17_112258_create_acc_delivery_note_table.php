<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccDeliveryNoteTable extends Migration {

	public function up()
	{
		Schema::create('acc_delivery_note', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->integer('sales_order_id')->nullable();
			$table->integer('sales_invoice_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->text('description')->nullable();
			$table->integer('quantity')->nullable();
			$table->text('delivery_address')->nullable();
			$table->string('title')->nullable();
			$table->integer('footer_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_delivery_note');
	}
}