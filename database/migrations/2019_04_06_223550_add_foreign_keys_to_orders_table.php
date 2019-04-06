<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->foreign('status_id', 'fk_orders_status1')->references('id')->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('creator_id', 'fk_orders_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('client_id', 'fk_orders_users2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('transporter_id', 'fk_orders_users3')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_addresses_id', 'fk_orders_users_addresses1')->references('id')->on('users_addresses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->dropForeign('fk_orders_status1');
			$table->dropForeign('fk_orders_users1');
			$table->dropForeign('fk_orders_users2');
			$table->dropForeign('fk_orders_users3');
			$table->dropForeign('fk_orders_users_addresses1');
		});
	}

}
