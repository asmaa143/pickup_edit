<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('state_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('state_id')->unsigned();
			$table->string('locale')->nullable();
			$table->string('title', 191)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('state_translations');
	}
}