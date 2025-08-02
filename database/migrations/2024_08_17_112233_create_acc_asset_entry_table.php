<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccAssetEntryTable extends Migration {

	public function up()
	{
		Schema::create('acc_asset_entry', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->datetime('date')->nullable();
			$table->string('reference')->nullable();
			$table->text('description')->nullable();
			$table->double('amount')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_asset_entry');
	}
}