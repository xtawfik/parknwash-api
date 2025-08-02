<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccReceiptTable extends Migration {

	public function up()
	{
		Schema::create('acc_receipt', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->enum('paid_by_type', array('other', 'customer', 'supplier'))->nullable();
			$table->string('other_name')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->integer('bank_account_id')->nullable();
			$table->text('description')->nullable();
			$table->double('total')->nullable();
			$table->double('fixed_total')->nullable();
			$table->integer('sales_invoice_id')->nullable();
			$table->double('out_of_balance')->nullable();
			$table->double('amount')->nullable();
			$table->string('title')->nullable();
			$table->integer('footer_id')->nullable();
			$table->datetime('cleared_at')->nullable();
			$table->integer('inventory_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_receipt');
	}
}