<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases_detail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('purchases_id')->index('fk_purchases_detail_purchases1_idx');
			$table->integer('product_id')->index('fk_purchases_detail_products1_idx');
			$table->integer('quantity');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases_detail');
	}

}
