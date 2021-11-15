<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackegesFeaturesTable extends Migration {

	public function up()
	{
		Schema::create('packeges_features', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('kindoffeature_id')->unsigned()->nullable();
			$table->string('price')->nullable();
			$table->integer('number')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('packeges_features');
	}
}