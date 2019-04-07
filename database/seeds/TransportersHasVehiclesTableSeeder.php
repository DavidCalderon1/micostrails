<?php

use Illuminate\Database\Seeder;

class TransportersHasVehiclesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transporters_has_vehicles')->delete();
        
        \DB::table('transporters_has_vehicles')->insert(array (
            0 => 
            array (
                'users_id' => 16,
                'vehicles_id' => 4,
            ),
            1 => 
            array (
                'users_id' => 17,
                'vehicles_id' => 2,
            ),
            2 => 
            array (
                'users_id' => 18,
                'vehicles_id' => 5,
            ),
            3 => 
            array (
                'users_id' => 19,
                'vehicles_id' => 3,
            ),
            4 => 
            array (
                'users_id' => 20,
                'vehicles_id' => 1,
            ),
            5 => 
            array (
                'users_id' => 21,
                'vehicles_id' => 6,
            ),
        ));
        
        
    }
}