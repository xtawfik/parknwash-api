<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccTaxCodeCustomTable extends Migration {

	public function up()
	{
		Schema::create('acc_tax_code_custom', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->decimal('rate')->nullable();
			$table->integer('balance_sheet_account_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('tax_code_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_tax_code_custom');
	}
}