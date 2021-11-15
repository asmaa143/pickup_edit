<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTagsTable extends Migration {

	public function up()
	{
		Schema::create('products_tags', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products_tags');
	}
}