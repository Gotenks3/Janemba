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
            'name' => '食料・飲料・お酒',
        ],
        [
            'name' => 'ドラッグストア・美容',
        ],
        [
            'name' => 'スポーツ・アウトドア',
        ],
        [
            'name' => '家電・カメラ',
        ],
        [
            'name' => 'パソコン・オフィス用品',
        ],
        [
            'name' => '本・漫画・雑誌',
        ]
    ]);
    }
}
