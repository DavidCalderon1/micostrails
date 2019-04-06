<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchases', function(Blueprint $table)
		{
			$table->foreign('providers_id', 'fk_purchases_providers1')->references('id')->on('providers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('storage_id', 'fk_purchases_storages1')->references('id')->on('storages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchases', function(Blueprint $table)
		{
			$table->dropForeign('fk_purchases_providers1');
			$table->dropForeign('fk_purchases_storages1');
		});
	}

}
