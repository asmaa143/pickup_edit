<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAreasTable extends Migration {

	public function up()
	{
		Schema::create('areas', function(Blueprint $table) {
			$table->increments('id');
			$table->double('lat')->nullable();
			$table->double('lon')->nullable();
			$table->integer('zone_id')->unsigned();
			$table->timestamps();
			$table->integer('state_id')->unsigned();
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('areas');
	}
}