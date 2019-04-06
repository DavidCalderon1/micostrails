<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductsHasProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products_has_providers', function(Blueprint $table)
		{
			$table->foreign('products_id', 'fk_products_has_providers_products')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('providers_id', 'fk_products_has_providers_providers1')->references('id')->on('providers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products_has_providers', function(Blueprint $table)
		{
			$table->dropForeign('fk_products_has_providers_products');
			$table->dropForeign('fk_products_has_providers_providers1');
		});
	}

}
