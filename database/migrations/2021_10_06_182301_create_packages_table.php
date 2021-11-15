<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackagesTable extends Migration {

	public function up()
	{
		Schema::create('packages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('monthprice')->nullable();
			$table->string('3monthprice')->nullable();
			$table->string('6monthprice')->nullable();
			$table->string('yearprice')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('packages');
	}
}