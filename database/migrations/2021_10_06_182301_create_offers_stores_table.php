<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersStoresTable extends Migration {

	public function up()
	{
		Schema::create('offers_stores', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('offer_id')->unsigned();
			$table->integer('store_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('offers_stores');
	}
}