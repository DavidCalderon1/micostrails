<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'admin@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => 'xYtJJSVKIQhfQQaSZXku9jBamd0AJCciP7crMX0zYlZBztAKnYalobC7c9E4',
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sofia',
                'email' => 'sofia@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Angel',
                'email' => 'angel@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hocks',
                'email' => 'hocks@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Michael',
                'email' => 'michael@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Bar de Alex',
                'email' => 'bar_de_alex@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sabor Criollo',
                'email' => 'sabor_criollo@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'El Pollo Rojo',
                'email' => 'el_pollo_rojo@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'All Salad',
                'email' => 'all_salad@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Parrilla y sabor',
                'email' => 'parrilla_y_sabor@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'restaurante yerbabuena ',
                'email' => 'restaurante_yerbabuena@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Luis David',
                'email' => 'luis_david@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'David Carruyo',
                'email' => 'david_carruyo@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'MARIO',
                'email' => 'mario@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Harold',
                'email' => 'harold@mail.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => NULL,
                'created_at' => '2019-04-07 05:37:57',
                'updated_at' => '2019-04-07 05:37:57',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Jeanette Goodwin',
                'email' => 'bcollier@example.net',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => 'bbuQKSYT0S',
                'created_at' => '2019-04-08 08:16:15',
                'updated_at' => '2019-04-08 08:16:15',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Alfonso Considine',
                'email' => 'lacy.emard@example.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => 'hmQZ1o57hO',
                'created_at' => '2019-04-08 08:16:15',
                'updated_at' => '2019-04-08 08:16:15',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Dorothea Welch',
                'email' => 'lemuel.goodwin@example.net',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => '5liM8FQOJy',
                'created_at' => '2019-04-08 08:16:15',
                'updated_at' => '2019-04-08 08:16:15',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Judy Conroy',
                'email' => 'hillard99@example.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => 'ftfW2iMzxo',
                'created_at' => '2019-04-08 08:16:15',
                'updated_at' => '2019-04-08 08:16:15',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Dr. Concepcion Swift III',
                'email' => 'zoey.schuster@example.com',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => 'sK8LyEU6CR',
                'created_at' => '2019-04-08 08:16:15',
                'updated_at' => '2019-04-08 08:16:15',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Jaylan Tremblay',
                'email' => 'blanca28@example.org',
                'password' => '$2y$10$LgS.jvdYwYe7j4ll6hQN8.oncwxP8c2TGx3l4CS9Ql2AJejYnAv8y',
                'remember_token' => 'KdD2z2ls5j',
                'created_at' => '2019-04-08 08:16:15',
                'updated_at' => '2019-04-08 08:16:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}