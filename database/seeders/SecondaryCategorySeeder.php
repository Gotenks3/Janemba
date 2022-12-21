<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secondary_categories')->insert([
        [
            'primary_category_id' => 1,
            'name' => 'ギニュー',
        ],
        [
            'primary_category_id' => 1,
            'name' => 'ジース',
        ],
        [
            'primary_category_id' => 1,
            'name' => 'バータ',
        ],
        [
            'primary_category_id' => 1,
            'name' => 'フリーザ',
        ],
        [
            'primary_category_id' => 2,
            'name' => 'Dr.ゲロ',
        ],
        [
            'primary_category_id' => 2,
            'name' => '17号',
        ],
        [
            'primary_category_id' => 2,
            'name' => '18号',
        ],
        [
            'primary_category_id' => 2,
            'name' => 'セル',
        ],
        [
            'primary_category_id' => 3,
            'name' => 'ダーブラ',
        ],
        [
            'primary_category_id' => 3,
            'name' => 'ゴテンクス',
        ],
        [
            'primary_category_id' => 3,
            'name' => 'ベジット',
        ],
        [
            'primary_category_id' => 3,
            'name' => '魔人ブウ',
        ],
        [
            'primary_category_id' => 4,
            'name' => 'メタルクウラ',
        ],
        [
            'primary_category_id' => 4,
            'name' => 'ボージャック',
        ],
        [
            'primary_category_id' => 4,
            'name' => 'ブロリー',
        ],
        [
            'primary_category_id' => 4,
            'name' => 'ジャネンバ',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'ビルス',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'ウイス',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'ジレン',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'ヒット',
        ],
    ]);
    }
}
