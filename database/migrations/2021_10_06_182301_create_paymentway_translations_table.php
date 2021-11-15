<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentwayTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('paymentway_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('locale')->nullable();
			$table->integer('paymentway_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('paymentway_translations');
	}
}