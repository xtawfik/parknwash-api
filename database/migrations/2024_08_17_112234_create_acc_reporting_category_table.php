<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccReportingCategoryTable extends Migration {

	public function up()
	{
		Schema::create('acc_reporting_category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->nullable();
			$table->integer('category_id')->nullable();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_reporting_category');
	}
}