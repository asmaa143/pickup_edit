<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMajorTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('major_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->integer('major_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('major_translations');
	}
}