<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccFixedAssetTable extends Migration {

	public function up()
	{
		Schema::create('acc_fixed_asset', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('code')->nullable();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->decimal('depreciation_rate')->nullable();
			$table->text('description')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('division_id')->nullable();
			$table->integer('place_id')->nullable();
			$table->integer('division_place_id')->nullable();
			$table->integer('control_account_cost_id')->nullable();
			$table->integer('control_account_depreciation_id')->nullable();
			$table->double('acquisition_cost')->nullable();
			$table->double('acccumulated_depreciation')->nullable();
			$table->integer('profit_loss_account_id')->nullable();
			$table->datetime('date_disposal')->nullable();
			$table->integer('disposal_account_id')->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->double('book_value')->nullable();
			$table->double('depreciation')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_fixed_asset');
	}
}