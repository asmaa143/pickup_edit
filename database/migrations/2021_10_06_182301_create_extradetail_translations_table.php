<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtradetailTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('extradetail_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->integer('extradetail_id')->unsigned();
			$table->string('locale')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('extradetail_translations');
	}
}