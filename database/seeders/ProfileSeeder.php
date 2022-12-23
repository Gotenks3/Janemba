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
            'user_id' => '1',
            'nickname' => 'トランクス',
            'content' => '破壊王子ベジータの息子',
            'icon' => 'bezita.jpeg',
            'prefecture' => 21,
            'gender' => 1,
            'age' => 19
        ]);
    }
}
