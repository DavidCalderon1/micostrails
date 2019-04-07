<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Leche',
                'description' => 'Leche',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Huevos',
                'description' => 'Huevos',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Manzana Verde',
                'description' => 'Manzana Verde',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pepino Cohombro',
                'description' => 'Pepino Cohombro',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Pimentón Rojo',
                'description' => 'Pimentón Rojo',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Kiwi',
                'description' => 'Kiwi',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Cebolla Cabezona Blanca Limpia',
                'description' => 'Cebolla Cabezona Blanca Limpia',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Habichuela',
                'description' => 'Habichuela',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Mango Tommy Maduro',
                'description' => 'Mango Tommy Maduro',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Tomate Chonto Pintón',
                'description' => 'Tomate Chonto Pintón',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Zanahoria Grande',
                'description' => 'Zanahoria Grande',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Aguacate Maduro',
                'description' => 'Aguacate Maduro',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Kale o Col Rizada',
                'description' => 'Kale o Col Rizada',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Cebolla Cabezona Roja Limpia',
                'description' => 'Cebolla Cabezona Roja Limpia',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Tomate Chonto Maduro',
                'description' => 'Tomate Chonto Maduro',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Acelga',
                'description' => 'Acelga',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Espinaca Bogotana x 500grs',
                'description' => 'Espinaca Bogotana x 500grs',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Ahuyama',
                'description' => 'Ahuyama',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Cebolla Cabezona Blanca Sin Pelar',
                'description' => 'Cebolla Cabezona Blanca Sin Pelar',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Melón',
                'description' => 'Melón',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Cebolla Cabezona Roja Sin Pelar',
                'description' => 'Cebolla Cabezona Roja Sin Pelar',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Cebolla Larga Junca x 500grs',
                'description' => 'Cebolla Larga Junca x 500grs',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Hierbabuena x 500grs',
                'description' => 'Hierbabuena x 500grs',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Lechuga Crespa Verde',
                'description' => 'Lechuga Crespa Verde',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Limón Tahití',
                'description' => 'Limón Tahití',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Mora de Castilla',
                'description' => 'Mora de Castilla',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Pimentón Verde',
                'description' => 'Pimentón Verde',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Tomate Larga Vida Maduro',
                'description' => 'Tomate Larga Vida Maduro',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Cilantro x 500grs',
                'description' => 'Cilantro x 500grs',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Fresa Jugo',
                'description' => 'Fresa Jugo',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Papa R-12 Mediana',
                'description' => 'Papa R-12 Mediana',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Curuba "',
                'description' => 'Curuba "',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Brócoli',
                'description' => 'Brócoli',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Aguacate Hass Pintón',
                'description' => 'Aguacate Hass Pintón',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Aguacate Hass Maduro "',
                'description' => 'Aguacate Hass Maduro "',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Aguacate Pintón',
                'description' => 'Aguacate Pintón',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Pan Bimbo',
                'description' => 'Pan Bimbo',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'Lechuga Crespa Morada',
                'description' => 'Lechuga Crespa Morada',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'Banano',
                'description' => 'Banano',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 43,
                'name' => 'Banano',
                'description' => 'Banano',
                'created_at' => '2019-04-07 02:29:18',
                'updated_at' => '2019-04-07 02:29:18',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}