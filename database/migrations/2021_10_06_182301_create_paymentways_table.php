<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentwaysTable extends Migration {

	public function up()
	{
		Schema::create('paymentways', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('paymentways');
	}
}