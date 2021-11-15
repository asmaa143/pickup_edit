<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoresTable extends Migration {

	public function up()
	{
		Schema::create('stores', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->nullable();
			$table->string('responsible_name');
			$table->integer('major_id')->unsigned()->nullable();
			$table->string('cr_no')->nullable();
			$table->string('tax_number')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->integer('state_id')->nullable();
			$table->integer('city_id');
			$table->integer('zone_id')->unsigned()->nullable();
			$table->text('address')->nullable();
			$table->string('password')->nullable();
			$table->string('contract_image')->nullable();
			$table->string('sales_officer')->nullable();
			$table->double('lat')->nullable();
			$table->double('lon')->nullable();
			$table->string('logo')->nullable();
			$table->text('comment')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('stores');
	}
}