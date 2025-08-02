<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccJournalEntryTable extends Migration {

	public function up()
	{
		Schema::create('acc_journal_entry', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->integer('currency_id')->nullable();
			$table->text('description')->nullable();
			$table->boolean('cash_transaction')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('footer_id')->nullable();
			$table->enum('status', array('balanced', 'unbalanced'))->nullable();
			$table->string('accounts')->nullable();
			$table->double('debit')->nullable();
			$table->double('credit')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_journal_entry');
	}
}