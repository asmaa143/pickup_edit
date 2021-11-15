<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('phone')->nullable();
			$table->text('password')->nullable();
			$table->string('device_token')->nullable();
			$table->string('device_id')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}