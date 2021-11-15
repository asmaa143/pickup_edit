<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKindoffeatureTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('kindoffeature_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('kindoffeature_id')->unsigned();
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('kindoffeature_translations');
	}
}