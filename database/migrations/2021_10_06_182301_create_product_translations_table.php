<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('product_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned()->nullable();
			$table->string('locale')->nullable();
			$table->string('title')->nullable();
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('product_translations');
	}
}