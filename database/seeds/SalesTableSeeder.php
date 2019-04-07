<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sales')->delete();
        
        \DB::table('sales')->insert(array (
            0 => 
            array (
                'id' => 1,
                'orders_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'orders_id' => 1,
                'product_id' => 2,
                'quantity' => 21,
            ),
            2 => 
            array (
                'id' => 3,
                'orders_id' => 1,
                'product_id' => 37,
                'quantity' => 7,
            ),
            3 => 
            array (
                'id' => 4,
                'orders_id' => 1,
                'product_id' => 3,
                'quantity' => 10,
            ),
            4 => 
            array (
                'id' => 5,
                'orders_id' => 1,
                'product_id' => 4,
                'quantity' => 5,
            ),
            5 => 
            array (
                'id' => 6,
                'orders_id' => 2,
                'product_id' => 5,
                'quantity' => 100,
            ),
            6 => 
            array (
                'id' => 7,
                'orders_id' => 2,
                'product_id' => 6,
                'quantity' => 60,
            ),
            7 => 
            array (
                'id' => 8,
                'orders_id' => 3,
                'product_id' => 7,
                'quantity' => 4,
            ),
            8 => 
            array (
                'id' => 9,
                'orders_id' => 3,
                'product_id' => 8,
                'quantity' => 3,
            ),
            9 => 
            array (
                'id' => 10,
                'orders_id' => 3,
                'product_id' => 9,
                'quantity' => 4,
            ),
            10 => 
            array (
                'id' => 11,
                'orders_id' => 3,
                'product_id' => 10,
                'quantity' => 8,
            ),
            11 => 
            array (
                'id' => 12,
                'orders_id' => 3,
                'product_id' => 11,
                'quantity' => 5,
            ),
            12 => 
            array (
                'id' => 13,
                'orders_id' => 4,
                'product_id' => 12,
                'quantity' => 3,
            ),
            13 => 
            array (
                'id' => 14,
                'orders_id' => 4,
                'product_id' => 13,
                'quantity' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'orders_id' => 4,
                'product_id' => 14,
                'quantity' => 4,
            ),
            15 => 
            array (
                'id' => 16,
                'orders_id' => 4,
                'product_id' => 4,
                'quantity' => 2,
            ),
            16 => 
            array (
                'id' => 17,
                'orders_id' => 4,
                'product_id' => 15,
                'quantity' => 3,
            ),
            17 => 
            array (
                'id' => 18,
                'orders_id' => 5,
                'product_id' => 16,
                'quantity' => 1500,
            ),
            18 => 
            array (
                'id' => 19,
                'orders_id' => 6,
                'product_id' => 17,
                'quantity' => 2,
            ),
            19 => 
            array (
                'id' => 20,
                'orders_id' => 6,
                'product_id' => 18,
                'quantity' => 3,
            ),
            20 => 
            array (
                'id' => 21,
                'orders_id' => 6,
                'product_id' => 15,
                'quantity' => 2,
            ),
            21 => 
            array (
                'id' => 22,
                'orders_id' => 6,
                'product_id' => 19,
                'quantity' => 2,
            ),
            22 => 
            array (
                'id' => 23,
                'orders_id' => 6,
                'product_id' => 20,
                'quantity' => 3,
            ),
            23 => 
            array (
                'id' => 24,
                'orders_id' => 7,
                'product_id' => 21,
                'quantity' => 3,
            ),
            24 => 
            array (
                'id' => 25,
                'orders_id' => 7,
                'product_id' => 22,
                'quantity' => 2,
            ),
            25 => 
            array (
                'id' => 26,
                'orders_id' => 7,
                'product_id' => 23,
                'quantity' => 2,
            ),
            26 => 
            array (
                'id' => 27,
                'orders_id' => 7,
                'product_id' => 39,
                'quantity' => 4,
            ),
            27 => 
            array (
                'id' => 28,
                'orders_id' => 7,
                'product_id' => 24,
                'quantity' => 15,
            ),
            28 => 
            array (
                'id' => 29,
                'orders_id' => 8,
                'product_id' => 25,
                'quantity' => 3,
            ),
            29 => 
            array (
                'id' => 30,
                'orders_id' => 8,
                'product_id' => 26,
                'quantity' => 2,
            ),
            30 => 
            array (
                'id' => 31,
                'orders_id' => 8,
                'product_id' => 22,
                'quantity' => 4,
            ),
            31 => 
            array (
                'id' => 32,
                'orders_id' => 8,
                'product_id' => 27,
                'quantity' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'orders_id' => 8,
                'product_id' => 5,
                'quantity' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'orders_id' => 9,
                'product_id' => 22,
                'quantity' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'orders_id' => 15,
                'product_id' => 28,
                'quantity' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'orders_id' => 10,
                'product_id' => 7,
                'quantity' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'orders_id' => 11,
                'product_id' => 41,
                'quantity' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'orders_id' => 11,
                'product_id' => 19,
                'quantity' => 6,
            ),
            38 => 
            array (
                'id' => 39,
                'orders_id' => 11,
                'product_id' => 29,
                'quantity' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'orders_id' => 11,
                'product_id' => 17,
                'quantity' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'orders_id' => 11,
                'product_id' => 30,
                'quantity' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'orders_id' => 12,
                'product_id' => 7,
                'quantity' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'orders_id' => 12,
                'product_id' => 25,
                'quantity' => 2,
            ),
            43 => 
            array (
                'id' => 44,
                'orders_id' => 12,
                'product_id' => 5,
                'quantity' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'orders_id' => 12,
                'product_id' => 31,
                'quantity' => 25,
            ),
            45 => 
            array (
                'id' => 46,
                'orders_id' => 13,
                'product_id' => 43,
                'quantity' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'orders_id' => 13,
                'product_id' => 30,
                'quantity' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'orders_id' => 13,
                'product_id' => 32,
                'quantity' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'orders_id' => 13,
                'product_id' => 33,
                'quantity' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'orders_id' => 13,
                'product_id' => 28,
                'quantity' => 2,
            ),
            50 => 
            array (
                'id' => 51,
                'orders_id' => 14,
                'product_id' => 16,
                'quantity' => 3,
            ),
            51 => 
            array (
                'id' => 52,
                'orders_id' => 14,
                'product_id' => 34,
                'quantity' => 3,
            ),
            52 => 
            array (
                'id' => 53,
                'orders_id' => 14,
                'product_id' => 35,
                'quantity' => 3,
            ),
            53 => 
            array (
                'id' => 54,
                'orders_id' => 14,
                'product_id' => 12,
                'quantity' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'orders_id' => 14,
                'product_id' => 36,
                'quantity' => 1,
            ),
        ));
        
        
    }
}