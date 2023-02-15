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
                'name' => 'ユーザー１',
                'email' => 'a@a',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ユーザー２',
                'email' => 'b@b',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ユーザー３',
                'email' => 'c@c',
                'password' => Hash::make('rikuriku'),
                'created_at' => '2021/01/01 11:11:11'
            ]
        ]);
    }
}
