<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	public function up()
	{
		Schema::create('expenses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('expensetype_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('expenses');
	}
}