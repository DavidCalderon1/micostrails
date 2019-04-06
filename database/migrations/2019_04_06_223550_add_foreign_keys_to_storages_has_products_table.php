<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoragesHasProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storages_has_products', function(Blueprint $table)
		{
			$table->foreign('products_id', 'fk_storages_has_products_products1')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('storages_id', 'fk_storages_has_products_storages1')->references('id')->on('storages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storages_has_products', function(Blueprint $table)
		{
			$table->dropForeign('fk_storages_has_products_products1');
			$table->dropForeign('fk_storages_has_products_storages1');
		});
	}

}
