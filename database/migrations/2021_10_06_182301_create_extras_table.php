<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtrasTable extends Migration {

	public function up()
	{
		Schema::create('extras', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->tinyInteger('optional')->nullable()->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('extras');
	}
}