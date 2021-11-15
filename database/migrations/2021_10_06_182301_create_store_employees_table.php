<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('store_employees', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->integer('store_id')->unsigned();
			$table->string('password')->nullable();
			$table->string('image')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('store_employees');
	}
}