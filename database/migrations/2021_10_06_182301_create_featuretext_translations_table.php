<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeaturetextTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('featuretext_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->text('text')->nullable();
			$table->string('locale')->nullable();
			$table->integer('featuretext_id')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('featuretext_translations');
	}
}