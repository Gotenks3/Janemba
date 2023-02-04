<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            [
                'product_id' => 1,
                'type' => 1,
                'quantity' => 20,
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'product_id' => 2,
                'type' => 1,
                'quantity' => 20,
                'created_at' => '2021/01/01 11:11:11'
            ],
        ]);
    }
}
