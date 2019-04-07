<?php

use Illuminate\Database\Seeder;

class UsersHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users_has_roles')->delete();
        
        \DB::table('users_has_roles')->insert(array (
            0 => 
            array (
                'users_id' => 1,
                'roles_id' => 1,
            ),
            1 => 
            array (
                'users_id' => 2,
                'roles_id' => 3,
            ),
            2 => 
            array (
                'users_id' => 3,
                'roles_id' => 3,
            ),
            3 => 
            array (
                'users_id' => 4,
                'roles_id' => 3,
            ),
            4 => 
            array (
                'users_id' => 5,
                'roles_id' => 3,
            ),
            5 => 
            array (
                'users_id' => 6,
                'roles_id' => 3,
            ),
            6 => 
            array (
                'users_id' => 7,
                'roles_id' => 3,
            ),
            7 => 
            array (
                'users_id' => 8,
                'roles_id' => 3,
            ),
            8 => 
            array (
                'users_id' => 9,
                'roles_id' => 3,
            ),
            9 => 
            array (
                'users_id' => 10,
                'roles_id' => 3,
            ),
            10 => 
            array (
                'users_id' => 11,
                'roles_id' => 3,
            ),
            11 => 
            array (
                'users_id' => 12,
                'roles_id' => 3,
            ),
            12 => 
            array (
                'users_id' => 13,
                'roles_id' => 3,
            ),
            13 => 
            array (
                'users_id' => 14,
                'roles_id' => 3,
            ),
            14 => 
            array (
                'users_id' => 15,
                'roles_id' => 3,
            ),
            15 => 
            array (
                'users_id' => 16,
                'roles_id' => 2,
            ),
            16 => 
            array (
                'users_id' => 17,
                'roles_id' => 2,
            ),
            17 => 
            array (
                'users_id' => 18,
                'roles_id' => 2,
            ),
            18 => 
            array (
                'users_id' => 19,
                'roles_id' => 2,
            ),
            19 => 
            array (
                'users_id' => 20,
                'roles_id' => 2,
            ),
            20 => 
            array (
                'users_id' => 21,
                'roles_id' => 2,
            ),
        ));
        
        
    }
}