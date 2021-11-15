<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('city_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 191)->nullable();
			$table->string('locale')->nullable();
			$table->integer('city_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('city_translations');
	}
}