<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccLatePaymentTable extends Migration {

	public function up()
	{
		Schema::create('acc_late_payment', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('sales_invoice_id')->nullable();
			$table->double('amount')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_late_payment');
	}
}