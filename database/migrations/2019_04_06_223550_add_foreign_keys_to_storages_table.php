<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoragesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storages', function(Blueprint $table)
		{
			$table->foreign('city_id', 'fk_storages_cities1')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storages', function(Blueprint $table)
		{
			$table->dropForeign('fk_storages_cities1');
		});
	}

}
