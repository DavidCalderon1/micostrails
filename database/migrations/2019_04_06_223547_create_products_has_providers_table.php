<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsHasProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_has_providers', function(Blueprint $table)
		{
			$table->integer('products_id')->index('fk_products_has_providers_products_idx');
			$table->integer('providers_id')->index('fk_products_has_providers_providers1_idx');
			$table->float('cost', 11);
			$table->primary(['products_id','providers_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_has_providers');
	}

}
