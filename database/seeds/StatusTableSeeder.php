<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status')->delete();
        
        \DB::table('status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Registrado',
                'position' => 1,
                'color' => '#000000',
                'created_at' => '2019-04-06 16:34:02',
                'updated_at' => '2019-04-06 16:48:02',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Confirman pedido',
                'position' => 2,
                'color' => '#0080ff',
                'created_at' => '2019-04-06 16:48:45',
                'updated_at' => '2019-04-06 16:56:57',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Alistamiento',
                'position' => 3,
                'color' => '#ffff80',
                'created_at' => '2019-04-06 16:58:06',
                'updated_at' => '2019-04-06 18:21:56',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Salida',
                'position' => 4,
                'color' => '#ff8040',
                'created_at' => '2019-04-06 16:34:02',
                'updated_at' => '2019-04-06 18:22:44',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Llegada',
                'position' => 5,
                'color' => '#80ffff',
                'created_at' => '2019-04-06 16:48:45',
                'updated_at' => '2019-04-06 17:55:19',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Entregado',
                'position' => 6,
                'color' => '#28a745',
                'created_at' => '2019-04-06 16:58:06',
                'updated_at' => '2019-04-06 17:49:22',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Cancelacion',
                'position' => 99,
                'color' => '#ff0000',
                'created_at' => '2019-04-06 16:58:06',
                'updated_at' => '2019-04-06 17:49:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}