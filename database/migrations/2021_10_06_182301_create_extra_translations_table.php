<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('extra_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->integer('exra_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('extra_translations');
	}
}