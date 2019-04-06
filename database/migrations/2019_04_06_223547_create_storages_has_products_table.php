<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoragesHasProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storages_has_products', function(Blueprint $table)
		{
			$table->integer('storages_id')->index('fk_storages_has_products_storages1_idx');
			$table->integer('products_id')->index('fk_storages_has_products_products1_idx');
			$table->float('price', 11)->nullable();
			$table->primary(['storages_id','products_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storages_has_products');
	}

}
