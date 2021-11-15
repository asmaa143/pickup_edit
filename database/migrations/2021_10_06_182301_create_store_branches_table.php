<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreBranchesTable extends Migration {

	public function up()
	{
		Schema::create('store_branches', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->nullable();
			$table->integer('store_id')->unsigned();
			$table->double('lat')->nullable();
			$table->double('lon')->nullable();
			$table->integer('state_id')->unsigned()->nullable();
			$table->integer('city_id')->unsigned()->nullable();
			$table->integer('zone_id')->unsigned()->nullable();
			$table->text('address')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('store_branches');
	}
}