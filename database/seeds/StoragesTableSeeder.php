<?php

use Illuminate\Database\Seeder;

class StoragesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('storages')->delete();
        
        \DB::table('storages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Chapinero',
                'city_id' => 1,
                'created_at' => '2019-04-07 02:43:17',
                'updated_at' => '2019-04-07 02:58:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}