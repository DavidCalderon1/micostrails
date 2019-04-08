<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'creator_id' => 1,
                'client_id' => 2,
                'transporter_id' => 16,
                'storage_id' => 1,
                'users_addresses_id' => 2,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 1,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'creator_id' => 1,
                'client_id' => 3,
                'transporter_id' => 21,
                'storage_id' => 1,
                'users_addresses_id' => 3,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 1,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'creator_id' => 1,
                'client_id' => 4,
                'transporter_id' => 18,
                'storage_id' => 1,
                'users_addresses_id' => 4,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 3,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'creator_id' => 1,
                'client_id' => 5,
                'transporter_id' => 16,
                'storage_id' => 1,
                'users_addresses_id' => 5,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 1,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'creator_id' => 1,
                'client_id' => 6,
                'transporter_id' => 17,
                'storage_id' => 1,
                'users_addresses_id' => 6,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 1,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'creator_id' => 1,
                'client_id' => 7,
                'transporter_id' => 20,
                'storage_id' => 1,
                'users_addresses_id' => 7,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 2,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'creator_id' => 1,
                'client_id' => 8,
                'transporter_id' => 20,
                'storage_id' => 1,
                'users_addresses_id' => 8,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 2,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'creator_id' => 1,
                'client_id' => 9,
                'transporter_id' => 18,
                'storage_id' => 1,
                'users_addresses_id' => 9,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 7,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'creator_id' => 1,
                'client_id' => 10,
                'transporter_id' => 18,
                'storage_id' => 1,
                'users_addresses_id' => 10,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 1,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'creator_id' => 1,
                'client_id' => 11,
                'transporter_id' => 17,
                'storage_id' => 1,
                'users_addresses_id' => 11,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 1,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'creator_id' => 1,
                'client_id' => 12,
                'transporter_id' => 21,
                'storage_id' => 1,
                'users_addresses_id' => 12,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 10,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'creator_id' => 1,
                'client_id' => 13,
                'transporter_id' => 17,
                'storage_id' => 1,
                'users_addresses_id' => 13,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 2,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'creator_id' => 1,
                'client_id' => 14,
                'transporter_id' => 16,
                'storage_id' => 1,
                'users_addresses_id' => 14,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 3,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'creator_id' => 1,
                'client_id' => 15,
                'transporter_id' => 17,
                'storage_id' => 1,
                'users_addresses_id' => 15,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 8,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'creator_id' => 1,
                'client_id' => 2,
                'transporter_id' => 16,
                'storage_id' => 1,
                'users_addresses_id' => 2,
                'delivery_date' => '2019-03-01 00:00:00',
                'priority' => 9,
                'status_id' => 6,
                'paid' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}