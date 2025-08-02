<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccWithholdingTaxReceiptTable extends Migration {

	public function up()
	{
		Schema::create('acc_withholding_tax_receipt', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_withholding_tax_receipt');
	}
}