<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccGoodsReceiptTable extends Migration {

	public function up()
	{
		Schema::create('acc_goods_receipt', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->integer('purchase_order_id')->nullable();
			$table->integer('purchase_invoice_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->text('description')->nullable();
			$table->integer('quantity')->nullable();
			$table->string('title')->nullable();
			$table->integer('footer_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_goods_receipt');
	}
}