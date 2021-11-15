<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('state_translations', function(Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('city_translations', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('zones', function(Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('zones', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('zone_translations', function(Blueprint $table) {
			$table->foreign('zone_id')->references('id')->on('zones')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->foreign('zone_id')->references('id')->on('zones')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('major_translations', function(Blueprint $table) {
			$table->foreign('major_id')->references('id')->on('majors')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('stores_languages', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('store_branches', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('store_branches', function(Blueprint $table) {
			$table->foreign('zone_id')->references('id')->on('zones')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('category_translations', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('store_employees', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('offers_stores', function(Blueprint $table) {
			$table->foreign('offer_id')->references('id')->on('offers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('offers_stores', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('store_branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tags', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tag_translations', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('product_translations', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products_tags', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products_tags', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('extras', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('extra_translations', function(Blueprint $table) {
			$table->foreign('exra_id')->references('id')->on('extras')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('extra_details', function(Blueprint $table) {
			$table->foreign('extra_id')->references('id')->on('extras')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('extradetail_translations', function(Blueprint $table) {
			$table->foreign('extradetail_id')->references('id')->on('extra_details')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('discounts', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('expensetype_translations', function(Blueprint $table) {
			$table->foreign('expensetype_id')->references('id')->on('expenses_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('expenses', function(Blueprint $table) {
			$table->foreign('expensetype_id')->references('id')->on('expenses_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('paymentway_translations', function(Blueprint $table) {
			$table->foreign('paymentway_id')->references('id')->on('paymentways')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kindoffeature_translations', function(Blueprint $table) {
			$table->foreign('kindoffeature_id')->references('id')->on('kinds_of_features')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('packeges_features', function(Blueprint $table) {
			$table->foreign('kindoffeature_id')->references('id')->on('kinds_of_features')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('features_texts', function(Blueprint $table) {
			$table->foreign('packagefeature_id')->references('id')->on('packeges_features')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('featuretext_translations', function(Blueprint $table) {
			$table->foreign('featuretext_id')->references('id')->on('features_texts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('package_translations', function(Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('packages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('packages_featurepackage', function(Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('packages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('packages_featurepackage', function(Blueprint $table) {
			$table->foreign('featurepackage_id')->references('id')->on('packeges_features')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favorite_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favorite_products', function(Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('customers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('state_translations', function(Blueprint $table) {
			$table->dropForeign('state_translations_state_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_state_id_foreign');
		});
		Schema::table('city_translations', function(Blueprint $table) {
			$table->dropForeign('city_translations_city_id_foreign');
		});
		Schema::table('zones', function(Blueprint $table) {
			$table->dropForeign('zones_state_id_foreign');
		});
		Schema::table('zones', function(Blueprint $table) {
			$table->dropForeign('zones_city_id_foreign');
		});
		Schema::table('zone_translations', function(Blueprint $table) {
			$table->dropForeign('zone_translations_zone_id_foreign');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->dropForeign('areas_zone_id_foreign');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->dropForeign('areas_state_id_foreign');
		});
		Schema::table('areas', function(Blueprint $table) {
			$table->dropForeign('areas_city_id_foreign');
		});
		Schema::table('major_translations', function(Blueprint $table) {
			$table->dropForeign('major_translations_major_id_foreign');
		});
		Schema::table('stores_languages', function(Blueprint $table) {
			$table->dropForeign('stores_languages_store_id_foreign');
		});
		Schema::table('store_branches', function(Blueprint $table) {
			$table->dropForeign('store_branches_store_id_foreign');
		});
		Schema::table('store_branches', function(Blueprint $table) {
			$table->dropForeign('store_branches_zone_id_foreign');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->dropForeign('categories_store_id_foreign');
		});
		Schema::table('category_translations', function(Blueprint $table) {
			$table->dropForeign('category_translations_category_id_foreign');
		});
		Schema::table('store_employees', function(Blueprint $table) {
			$table->dropForeign('store_employees_store_id_foreign');
		});
		Schema::table('offers_stores', function(Blueprint $table) {
			$table->dropForeign('offers_stores_offer_id_foreign');
		});
		Schema::table('offers_stores', function(Blueprint $table) {
			$table->dropForeign('offers_stores_store_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_branch_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('tags', function(Blueprint $table) {
			$table->dropForeign('tags_store_id_foreign');
		});
		Schema::table('tag_translations', function(Blueprint $table) {
			$table->dropForeign('tag_translations_tag_id_foreign');
		});
		Schema::table('product_translations', function(Blueprint $table) {
			$table->dropForeign('product_translations_product_id_foreign');
		});
		Schema::table('products_tags', function(Blueprint $table) {
			$table->dropForeign('products_tags_product_id_foreign');
		});
		Schema::table('products_tags', function(Blueprint $table) {
			$table->dropForeign('products_tags_tag_id_foreign');
		});
		Schema::table('extras', function(Blueprint $table) {
			$table->dropForeign('extras_product_id_foreign');
		});
		Schema::table('extra_translations', function(Blueprint $table) {
			$table->dropForeign('extra_translations_exra_id_foreign');
		});
		Schema::table('extra_details', function(Blueprint $table) {
			$table->dropForeign('extra_details_extra_id_foreign');
		});
		Schema::table('extradetail_translations', function(Blueprint $table) {
			$table->dropForeign('extradetail_translations_extradetail_id_foreign');
		});
		Schema::table('discounts', function(Blueprint $table) {
			$table->dropForeign('discounts_product_id_foreign');
		});
		Schema::table('expensetype_translations', function(Blueprint $table) {
			$table->dropForeign('expensetype_translations_expensetype_id_foreign');
		});
		Schema::table('expenses', function(Blueprint $table) {
			$table->dropForeign('expenses_expensetype_id_foreign');
		});
		Schema::table('paymentway_translations', function(Blueprint $table) {
			$table->dropForeign('paymentway_translations_paymentway_id_foreign');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->dropForeign('coupons_store_id_foreign');
		});
		Schema::table('kindoffeature_translations', function(Blueprint $table) {
			$table->dropForeign('kindoffeature_translations_kindoffeature_id_foreign');
		});
		Schema::table('packeges_features', function(Blueprint $table) {
			$table->dropForeign('packeges_features_kindoffeature_id_foreign');
		});
		Schema::table('features_texts', function(Blueprint $table) {
			$table->dropForeign('features_texts_packagefeature_id_foreign');
		});
		Schema::table('featuretext_translations', function(Blueprint $table) {
			$table->dropForeign('featuretext_translations_featuretext_id_foreign');
		});
		Schema::table('package_translations', function(Blueprint $table) {
			$table->dropForeign('package_translations_package_id_foreign');
		});
		Schema::table('packages_featurepackage', function(Blueprint $table) {
			$table->dropForeign('packages_featurepackage_package_id_foreign');
		});
		Schema::table('packages_featurepackage', function(Blueprint $table) {
			$table->dropForeign('packages_featurepackage_featurepackage_id_foreign');
		});
		Schema::table('favorite_products', function(Blueprint $table) {
			$table->dropForeign('favorite_products_product_id_foreign');
		});
		Schema::table('favorite_products', function(Blueprint $table) {
			$table->dropForeign('favorite_products_customer_id_foreign');
		});
	}
}