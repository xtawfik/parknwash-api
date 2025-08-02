<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccAssetEntryItemTable extends Migration {

	public function up()
	{
		Schema::create('acc_asset_entry_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('fixed_asset_id')->nullable();
			$table->integer('intangible_asset_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->double('amount')->nullable();
			$table->integer('depreciation_entry_id')->nullable();
			$table->integer('amortization_entry_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_asset_entry_item');
	}
}