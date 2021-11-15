<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountsTable extends Migration {

	public function up()
	{
		Schema::create('discounts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('value')->nullable();
			$table->tinyInteger('percentage')->nullable()->default('0');
			$table->date('start_date')->nullable();
			$table->date('epired_date')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('discounts');
	}
}