<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('providers')->delete();
        
        \DB::table('providers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ruby',
                'phone' => '123456',
                'created_at' => '2019-04-07 02:17:15',
                'updated_at' => '2019-04-07 02:17:15',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Raul',
                'phone' => '1234567',
                'created_at' => '2019-04-07 02:17:15',
                'updated_at' => '2019-04-07 02:17:15',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Angelica',
                'phone' => '12345678',
                'created_at' => '2019-04-07 02:17:15',
                'updated_at' => '2019-04-07 02:17:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}