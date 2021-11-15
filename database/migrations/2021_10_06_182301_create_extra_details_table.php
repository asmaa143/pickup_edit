<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraDetailsTable extends Migration {

	public function up()
	{
		Schema::create('extra_details', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('extra_id')->unsigned()->nullable();
			$table->string('price')->nullable();
			$table->tinyInteger('default')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('extra_details');
	}
}