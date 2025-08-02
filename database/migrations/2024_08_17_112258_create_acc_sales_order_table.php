<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccSalesOrderTable extends Migration {

	public function up()
	{
		Schema::create('acc_sales_order', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('sales_quote_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->text('billing_address')->nullable();
			$table->string('title')->nullable();
			$table->enum('status', array('active', 'cancelled', 'inactive'))->nullable();
			$table->double('sub_total')->nullable();
			$table->double('withholding_tax')->nullable();
			$table->double('total')->nullable();
			$table->boolean('cancelled')->nullable();
			$table->boolean('show_item_image')->nullable();
			$table->boolean('hide_total')->nullable();
			$table->enum('withholding_tax_type', array('amount', 'rate'))->nullable();
			$table->integer('quantity_delivery')->nullable();
			$table->enum('delivery_status', array('delivered', 'undelivered', 'overdelivered', 'pending', 'partial'))->nullable();
			$table->double('invoice_amount')->nullable();
			$table->enum('invoice_status', array('invoiced', 'uninvoiced'))->nullable();
			$table->integer('sales_quotes')->nullable();
			$table->boolean('closed_invoice')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_sales_order');
	}
}