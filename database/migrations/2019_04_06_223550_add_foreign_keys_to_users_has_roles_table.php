<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersHasRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_has_roles', function(Blueprint $table)
		{
			$table->foreign('roles_id', 'fk_users_has_roles_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_users_has_roles_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_has_roles', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_has_roles_roles1');
			$table->dropForeign('fk_users_has_roles_users1');
		});
	}

}
