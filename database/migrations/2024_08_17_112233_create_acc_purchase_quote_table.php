<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccPurchaseQuoteTable extends Migration {

	public function up()
	{
		Schema::create('acc_purchase_quote', function(Blueprint $table) {
			$table->timestamps();
			$table->softDeletes();
			$table->integer('footer_id')->nullable();
			$table->integer('supplier_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->string('title')->nullable();
			$table->enum('status', array('active', 'inactive', 'cancelled', 'accepted', 'expired', 'rejected'))->nullable();
			$table->increments('id');
			$table->double('amount')->nullable();
			$table->boolean('request_for_quotation')->nullable();
			$table->enum('withholding_tax_type', array('amount', 'rate'))->nullable();
			$table->double('withholding_tax')->nullable();
			$table->boolean('cancelled')->nullable();
			$table->boolean('show_item_image')->nullable();
			$table->double('sub_total')->nullable();
			$table->double('total')->nullable();
			$table->integer('user_id')->nullable();
			$table->boolean('show_withholding_tax')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_purchase_quote');
	}
}