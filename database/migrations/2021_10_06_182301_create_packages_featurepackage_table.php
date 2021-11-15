<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackagesFeaturepackageTable extends Migration {

	public function up()
	{
		Schema::create('packages_featurepackage', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('package_id')->unsigned()->nullable();
			$table->integer('featurepackage_id')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('packages_featurepackage');
	}
}