<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZoneTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('zone_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->integer('zone_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('zone_translations');
	}
}