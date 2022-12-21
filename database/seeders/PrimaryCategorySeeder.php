<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
        [
            'name' => 'フリーザ編',
        ],
        [
            'name' => 'セル編',
        ],
        [
            'name' => '魔人ブウ編',
        ],
        [
            'name' => '映画編',
        ],
        [
            'name' => 'DB超編',
        ]
    ]);
    }
}
