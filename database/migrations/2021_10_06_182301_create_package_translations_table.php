<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackageTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('package_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->string('description')->nullable();
			$table->integer('package_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('package_translations');
	}
}