<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccDebitNoteTable extends Migration {

	public function up()
	{
		Schema::create('acc_debit_note', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->integer('purchase_invoice_id')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->string('title')->nullable();
			$table->boolean('tax_inclusive')->nullable();
			$table->double('total')->nullable();
			$table->integer('footer_id')->nullable();
			$table->double('sub_total')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_debit_note');
	}
}