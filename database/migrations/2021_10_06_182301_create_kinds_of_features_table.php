<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKindsOfFeaturesTable extends Migration {

	public function up()
	{
		Schema::create('kinds_of_features', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('kinds_of_features');
	}
}