<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchasesDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchases_detail', function(Blueprint $table)
		{
			$table->foreign('product_id', 'fk_purchases_detail_products1')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('purchases_id', 'fk_purchases_detail_purchases1')->references('id')->on('purchases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchases_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_purchases_detail_products1');
			$table->dropForeign('fk_purchases_detail_purchases1');
		});
	}

}
