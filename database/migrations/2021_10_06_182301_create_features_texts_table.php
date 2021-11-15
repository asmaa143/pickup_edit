<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeaturesTextsTable extends Migration {

	public function up()
	{
		Schema::create('features_texts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('packagefeature_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('features_texts');
	}
}