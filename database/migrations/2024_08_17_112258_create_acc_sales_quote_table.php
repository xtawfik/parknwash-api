<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccSalesQuoteTable extends Migration {

	public function up()
	{
		Schema::create('acc_sales_quote', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->datetime('date')->nullable();
			$table->datetime('expiry_date')->nullable();
			$table->integer('valid_days')->nullable();
			$table->string('reference')->nullable();
			$table->text('billing_address')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
			$table->string('title')->nullable();
			$table->enum('status', array('active', 'inactive', 'cancelled', 'accepted', 'expired', 'rejected'))->nullable();
			$table->double('sub_total')->nullable();
			$table->double('withholding_tax')->nullable();
			$table->double('total')->nullable();
			$table->boolean('cancelled')->nullable();
			$table->boolean('show_item_image')->nullable();
			$table->boolean('hide_total')->nullable();
			$table->enum('withholding_tax_type', array('amount', 'rate'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_sales_quote');
	}
}