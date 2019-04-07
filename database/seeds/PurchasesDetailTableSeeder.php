<?php

use Illuminate\Database\Seeder;

class PurchasesDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchases_detail')->delete();
        
        \DB::table('purchases_detail')->insert(array (
            0 => 
            array (
                'id' => 1,
                'purchases_id' => 1,
                'product_id' => 1,
                'quantity' => 3,
            ),
            1 => 
            array (
                'id' => 2,
                'purchases_id' => 1,
                'product_id' => 2,
                'quantity' => 3,
            ),
            2 => 
            array (
                'id' => 3,
                'purchases_id' => 1,
                'product_id' => 3,
                'quantity' => 7,
            ),
            3 => 
            array (
                'id' => 4,
                'purchases_id' => 1,
                'product_id' => 4,
                'quantity' => 8,
            ),
            4 => 
            array (
                'id' => 5,
                'purchases_id' => 1,
                'product_id' => 5,
                'quantity' => 10,
            ),
            5 => 
            array (
                'id' => 6,
                'purchases_id' => 1,
                'product_id' => 24,
                'quantity' => 9,
            ),
            6 => 
            array (
                'id' => 7,
                'purchases_id' => 1,
                'product_id' => 25,
                'quantity' => 10,
            ),
            7 => 
            array (
                'id' => 8,
                'purchases_id' => 1,
                'product_id' => 26,
                'quantity' => 40,
            ),
            8 => 
            array (
                'id' => 9,
                'purchases_id' => 1,
                'product_id' => 27,
                'quantity' => 2,
            ),
            9 => 
            array (
                'id' => 10,
                'purchases_id' => 2,
                'product_id' => 16,
                'quantity' => 9,
            ),
            10 => 
            array (
                'id' => 11,
                'purchases_id' => 2,
                'product_id' => 17,
                'quantity' => 17,
            ),
            11 => 
            array (
                'id' => 12,
                'purchases_id' => 2,
                'product_id' => 28,
                'quantity' => 3,
            ),
            12 => 
            array (
                'id' => 13,
                'purchases_id' => 2,
                'product_id' => 29,
                'quantity' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'purchases_id' => 2,
                'product_id' => 30,
                'quantity' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'purchases_id' => 2,
                'product_id' => 31,
                'quantity' => 9,
            ),
            15 => 
            array (
                'id' => 16,
                'purchases_id' => 2,
                'product_id' => 32,
                'quantity' => 10,
            ),
            16 => 
            array (
                'id' => 17,
                'purchases_id' => 2,
                'product_id' => 33,
                'quantity' => 2,
            ),
            17 => 
            array (
                'id' => 18,
                'purchases_id' => 2,
                'product_id' => 34,
                'quantity' => 3,
            ),
            18 => 
            array (
                'id' => 19,
                'purchases_id' => 2,
                'product_id' => 35,
                'quantity' => 3,
            ),
            19 => 
            array (
                'id' => 20,
                'purchases_id' => 2,
                'product_id' => 36,
                'quantity' => 6,
            ),
            20 => 
            array (
                'id' => 21,
                'purchases_id' => 3,
                'product_id' => 6,
                'quantity' => 15,
            ),
            21 => 
            array (
                'id' => 22,
                'purchases_id' => 3,
                'product_id' => 7,
                'quantity' => 26,
            ),
            22 => 
            array (
                'id' => 23,
                'purchases_id' => 3,
                'product_id' => 8,
                'quantity' => 11,
            ),
            23 => 
            array (
                'id' => 24,
                'purchases_id' => 3,
                'product_id' => 9,
                'quantity' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'purchases_id' => 3,
                'product_id' => 10,
                'quantity' => 8,
            ),
            25 => 
            array (
                'id' => 26,
                'purchases_id' => 3,
                'product_id' => 11,
                'quantity' => 7,
            ),
            26 => 
            array (
                'id' => 27,
                'purchases_id' => 3,
                'product_id' => 12,
                'quantity' => 8,
            ),
            27 => 
            array (
                'id' => 28,
                'purchases_id' => 3,
                'product_id' => 13,
                'quantity' => 2,
            ),
            28 => 
            array (
                'id' => 29,
                'purchases_id' => 3,
                'product_id' => 14,
                'quantity' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'purchases_id' => 3,
                'product_id' => 15,
                'quantity' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'purchases_id' => 3,
                'product_id' => 18,
                'quantity' => 8,
            ),
            31 => 
            array (
                'id' => 32,
                'purchases_id' => 3,
                'product_id' => 19,
                'quantity' => 9,
            ),
            32 => 
            array (
                'id' => 33,
                'purchases_id' => 3,
                'product_id' => 20,
                'quantity' => 9,
            ),
            33 => 
            array (
                'id' => 34,
                'purchases_id' => 3,
                'product_id' => 21,
                'quantity' => 3,
            ),
            34 => 
            array (
                'id' => 35,
                'purchases_id' => 3,
                'product_id' => 22,
                'quantity' => 6,
            ),
            35 => 
            array (
                'id' => 36,
                'purchases_id' => 3,
                'product_id' => 23,
                'quantity' => 9,
            ),
        ));
        
        
    }
}