<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('creator_id')->index('fk_orders_users1_idx');
			$table->integer('client_id')->index('fk_orders_users2_idx');
			$table->integer('transporter_id')->nullable()->index('fk_orders_users3_idx');
			$table->integer('users_addresses_id')->nullable()->index('fk_orders_users_addresses1_idx');
			$table->dateTime('delivery_date')->nullable();
			$table->boolean('priority')->nullable();
			$table->integer('status_id')->nullable()->index('fk_orders_status1_idx');
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
		Schema::drop('orders');
	}

}
