<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'user_id' => '1',
                'nickname' => 'user_id :1',
                'content' => '破壊王子ベジータの息子',
                'icon' => '156723925_63b15bb127630.jpg',
                'prefecture' => 21,
                'gender' => 1,
                'age' => 19
            ],
            [
                'user_id' => '2',
                'nickname' => 'user_id: 2',
                'content' => 'アイウエオ',
                'icon' => '228260389_63c948d3b12ac.jpg',
                'prefecture' => 5,
                'gender' => 2,
                'age' => 24
            ],
            [
                'user_id' => '3',
                'nickname' => '3',
                'content' => '3333333333',
                'icon' => '1683710299_63a54fb0372f8.jpg',
                'prefecture' => 9,
                'gender' => 1,
                'age' => 22
            ],
    ]);
    }
}
