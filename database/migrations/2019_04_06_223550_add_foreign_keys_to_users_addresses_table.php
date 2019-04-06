<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_addresses', function(Blueprint $table)
		{
			$table->foreign('city_id', 'fk_users_addresses_cities1')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_users_addresses_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_addresses', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_addresses_cities1');
			$table->dropForeign('fk_users_addresses_users1');
		});
	}

}
