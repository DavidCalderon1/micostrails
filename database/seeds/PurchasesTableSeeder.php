<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchases')->delete();
        
        \DB::table('purchases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'providers_id' => 1,
                'storage_id' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'providers_id' => 2,
                'storage_id' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'providers_id' => 3,
                'storage_id' => 1,
                'created_at' => '2019-03-01 00:00:00',
                'updated_at' => '2019-03-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}