<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransportersHasVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transporters_has_vehicles', function(Blueprint $table)
		{
			$table->integer('users_id');
			$table->integer('vehicles_id')->index('fk_transporters_has_vehicles_vehicles1_idx');
			$table->primary(['users_id','vehicles_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transporters_has_vehicles');
	}

}
