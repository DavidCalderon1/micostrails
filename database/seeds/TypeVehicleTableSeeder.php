<?php

use Illuminate\Database\Seeder;

class TypeVehicleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_vehicle')->delete();
        
        \DB::table('type_vehicle')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Automovil',
                'created_at' => '2019-04-07 02:40:04',
                'updated_at' => '2019-04-07 02:40:04',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Moto',
                'created_at' => '2019-04-07 02:40:21',
                'updated_at' => '2019-04-07 02:40:21',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Bicicleta',
                'created_at' => '2019-04-07 02:40:29',
                'updated_at' => '2019-04-07 02:40:29',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}