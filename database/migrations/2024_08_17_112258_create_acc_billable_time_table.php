<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccBillableTimeTable extends Migration {

	public function up()
	{
		Schema::create('acc_billable_time', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->text('description')->nullable();
			$table->time('time_spent')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('sales_invoice_id')->nullable();
			$table->double('amount')->nullable();
			$table->enum('status', array('invoiced', 'uninvoiced', 'written_off'))->nullable();
			$table->double('hourly_rate')->nullable();
			$table->datetime('written_off_date')->nullable();
			$table->integer('user_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_billable_time');
	}
}