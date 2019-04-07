<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrador',
                'created_at' => '2019-04-07 02:41:40',
                'updated_at' => '2019-04-07 02:41:40',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Transportador',
                'created_at' => '2019-04-07 02:41:51',
                'updated_at' => '2019-04-07 02:41:51',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cliente',
                'created_at' => '2019-04-07 02:41:59',
                'updated_at' => '2019-04-07 02:41:59',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}