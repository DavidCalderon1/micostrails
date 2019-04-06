<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransportersHasVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transporters_has_vehicles', function(Blueprint $table)
		{
			$table->foreign('users_id', 'fk_transporters_has_vehicles_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vehicles_id', 'fk_transporters_has_vehicles_vehicles1')->references('id')->on('vehicles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transporters_has_vehicles', function(Blueprint $table)
		{
			$table->dropForeign('fk_transporters_has_vehicles_users1');
			$table->dropForeign('fk_transporters_has_vehicles_vehicles1');
		});
	}

}
