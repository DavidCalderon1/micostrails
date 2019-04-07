<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles')->delete();
        
        \DB::table('vehicles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type_vehicle_id' => 1,
                'brand' => 'Mazda',
                'model' => '2018',
                'license_plate' => 'abc-123',
                'created_at' => '2019-04-07 03:02:32',
                'updated_at' => '2019-04-07 03:02:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type_vehicle_id' => 1,
                'brand' => 'Renault',
                'model' => '2018',
                'license_plate' => 'cba-321',
                'created_at' => '2019-04-07 03:02:32',
                'updated_at' => '2019-04-07 03:02:32',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type_vehicle_id' => 2,
                'brand' => 'Honda',
                'model' => '2018',
                'license_plate' => 'abc-12',
                'created_at' => '2019-04-07 03:02:32',
                'updated_at' => '2019-04-07 03:02:32',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'type_vehicle_id' => 2,
                'brand' => 'AKT',
                'model' => '2017',
                'license_plate' => 'cba-32',
                'created_at' => '2019-04-07 03:02:32',
                'updated_at' => '2019-04-07 03:02:32',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'type_vehicle_id' => 3,
                'brand' => 'GW',
                'model' => '2016',
                'license_plate' => '50125489-1',
                'created_at' => '2019-04-07 03:02:32',
                'updated_at' => '2019-04-07 03:02:32',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'type_vehicle_id' => 3,
                'brand' => 'Trek',
                'model' => '2018',
                'license_plate' => '1-20152105',
                'created_at' => '2019-04-07 03:02:32',
                'updated_at' => '2019-04-07 03:02:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}