<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_addresses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('fk_users_addresses_users1_idx');
			$table->string('address', 80);
			$table->string('latitude', 20)->nullable();
			$table->string('longitude', 20)->nullable();
			$table->integer('city_id')->nullable()->index('fk_users_addresses_cities1_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_addresses');
	}

}
