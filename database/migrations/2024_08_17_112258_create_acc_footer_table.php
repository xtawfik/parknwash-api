<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccFooterTable extends Migration {

	public function up()
	{
		Schema::create('acc_footer', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->text('content')->nullable();
			$table->text('code_editor')->nullable();
			$table->integer('footer_category_id')->nullable();
			$table->enum('status', array('active', 'inavtive'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('acc_footer');
	}
}