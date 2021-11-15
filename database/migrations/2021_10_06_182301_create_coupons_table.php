<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	public function up()
	{
		Schema::create('coupons', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('store_id')->unsigned();
			$table->string('code')->nullable();
			$table->time('start_date')->nullable();
			$table->time('end_date')->nullable();
			$table->integer('value')->nullable();
			$table->tinyInteger('percentage')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('coupons');
	}
}