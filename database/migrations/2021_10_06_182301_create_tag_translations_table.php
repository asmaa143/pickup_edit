<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('tag_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->integer('tag_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('tag_translations');
	}
}