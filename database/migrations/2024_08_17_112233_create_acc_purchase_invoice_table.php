<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPurchaseInvoiceTable extends Migration {

	public function up()
	{
		Schema::create('acc_purchase_invoice', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->enum('status', array('full', 'over', 'due', 'non'))->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->datetime('date')->nullable();
			$table->enum('due_type', array(''))->nullable();
			$table->datetime('due_date')->nullable();
			$table->integer('day')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->string('title')->nullable();
			$table->double('sub_total')->nullable();
			$table->double('total')->nullable();
			$table->enum('withholding_tax_type', array('amount', 'rate'))->nullable();
			$table->double('withholding_tax')->nullable();
			$table->boolean('closed_invoice')->nullable();
			$table->boolean('show_item_image')->nullable();
			$table->boolean('show_withholding_tax')->nullable();
			$table->double('balance_due')->nullable();
			$table->integer('days_to_due_date')->nullable();
			$table->integer('days_overdue')->nullable();
			$table->integer('sales_quote_id')->nullable();
			$table->integer('sales_order_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_purchase_invoice');
	}
}