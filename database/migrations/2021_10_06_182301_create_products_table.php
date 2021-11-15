<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('store_id')->unsigned()->nullable();
			$table->integer('branch_id')->unsigned();
			$table->string('image')->nullable();
			$table->integer('category_id')->unsigned();
			$table->string('preparation_time');
			$table->integer('calories')->nullable();
			$table->string('default_price')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}