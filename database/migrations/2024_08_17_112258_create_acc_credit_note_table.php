<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccCreditNoteTable extends Migration {

	public function up()
	{
		Schema::create('acc_credit_note', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('sales_invoice_id')->nullable();
			$table->integer('inventory_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->text('billing_address')->nullable();
			$table->boolean('tax_inclusive')->nullable();
			$table->boolean('amounts_are_tax_inclusive')->nullable();
			$table->enum('withholding_tax_type', array('amount', 'rate'))->nullable();
			$table->double('withholding_tax')->nullable();
			$table->string('title')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_credit_note');
	}
}