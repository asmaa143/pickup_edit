<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->nullable();
			$table->string('phone')->nullable();
			$table->string('password')->nullable();
			$table->string('image')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}