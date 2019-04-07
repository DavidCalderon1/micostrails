<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bogotá',
                'created_at' => '2019-04-07 02:07:25',
                'updated_at' => '2019-04-07 02:07:25',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}