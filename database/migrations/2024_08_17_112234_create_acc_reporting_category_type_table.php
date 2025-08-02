<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccReportingCategoryTypeTable extends Migration {

	public function up()
	{
		Schema::create('acc_reporting_category_type', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->integer('parent_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_reporting_category_type');
	}
}