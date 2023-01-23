<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'email' => 'a@a',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ベジット',
                'email' => 'b@b',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ブロリー',
                'email' => 'c@c',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'Googleログインテスト',
                'email' => 'riku.murakami333@gmail.com',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ウーブ',
                'email' => 'e@e',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ボルンが',
                'email' => 'f@f',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ]
        ]);
    }
}
