<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPaymentTable extends Migration {

	public function up()
	{
		Schema::create('acc_payment', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->integer('bank_account_id')->nullable();
			$table->double('amount')->nullable();
			$table->enum('paid_by_type', array('other', 'customer', 'supplier'))->nullable();
			$table->string('other_name')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->double('total')->nullable();
			$table->double('fixed_total')->nullable();
			$table->double('out_of_balance')->nullable();
			$table->integer('purchase_invoice_id')->nullable();
			$table->string('title')->nullable();
			$table->integer('footer_id')->nullable();
			$table->integer('inventory_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_payment');
	}
}