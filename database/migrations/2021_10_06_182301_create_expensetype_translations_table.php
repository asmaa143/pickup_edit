<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensetypeTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('expensetype_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('locale')->nullable();
			$table->string('title')->nullable();
			$table->integer('expensetype_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('expensetype_translations');
	}
}