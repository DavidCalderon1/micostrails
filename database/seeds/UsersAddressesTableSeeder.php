<?php

use Illuminate\Database\Seeder;

class UsersAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users_addresses')->delete();
        
        \DB::table('users_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'address' => 'Calle 123 # 45-67',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 07:49:50',
                'updated_at' => '2019-04-07 07:49:50',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'address' => 'KR 14 # 87 - 20 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'address' => 'KR 20 # 164A - 5 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'address' => 'KR 13 # 74 - 38 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'address' => 'CL 93 # 12 - 9 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 6,
                'address' => 'CL 71 # 3 - 74 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 7,
                'address' => 'KR 20 # 134A - 5 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 8,
                'address' => 'CL 80 # 14 - 38 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 9,
                'address' => 'KR 14 # 98 - 74 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 10,
                'address' => 'KR 58 # 93 - 1 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 11,
                'address' => 'CL 93B # 17 - 12 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 12,
                'address' => 'KR 68D # 98A - 11 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 13,
                'address' => 'AC 72 # 20 - 45 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 14,
                'address' => 'KR 22 # 122 - 57 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 15,
                'address' => 'KR 88 # 72A - 26 ',
                'latitude' => '4.116412',
                'longitude' => '-77.4409529',
                'city_id' => 1,
                'created_at' => '2019-04-07 12:49:50',
                'updated_at' => '2019-04-07 12:49:50',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}