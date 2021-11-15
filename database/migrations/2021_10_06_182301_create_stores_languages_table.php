<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoresLanguagesTable extends Migration {

	public function up()
	{
		Schema::create('stores_languages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('store_id')->unsigned();
			$table->string('lang')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('stores_languages');
	}
}