<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('expense_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title')->nullable();
			$table->text('description');
		});
	}

	public function down()
	{
		Schema::drop('expense_translations');
	}
}