<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccTaxCodeTable extends Migration {

	public function up()
	{
		Schema::create('acc_tax_code', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->double('code')->nullable();
			$table->integer('user_id')->nullable();
			$table->string('label')->nullable();
			$table->enum('tax_rate', array('zero', 'pass_through', 'custom'))->nullable();
			$table->string('invoice_title')->nullable();
			$table->string('credit_note_title')->nullable();
			$table->integer('balance_sheet_account_id')->nullable();
			$table->enum('custome_type', array('single', 'multiple'))->nullable();
			$table->decimal('rate')->nullable();
			$table->string('reverse_charged')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->integer('net_reporting_category_id')->nullable();
			$table->integer('net_reporting_category_reversed_id')->nullable();
			$table->integer('amount_reporting_category_reversed_id')->nullable();
			$table->integer('amount_reporting_category_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_tax_code');
	}
}