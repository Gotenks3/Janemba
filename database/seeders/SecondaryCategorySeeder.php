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
            'name' => '食料',
        ],
        [
            'primary_category_id' => 1,
            'name' => '飲料',
        ],
        [
            'primary_category_id' => 1,
            'name' => 'お酒',
        ],
        [
            'primary_category_id' => 2,
            'name' => '医療品',
        ],
        [
            'primary_category_id' => 2,
            'name' => 'ヘアケア・スタイリング',
        ],
        [
            'primary_category_id' => 2,
            'name' => '美容品',
        ],
        [
            'primary_category_id' => 2,
            'name' => '日用品',
        ],
        [
            'primary_category_id' => 3,
            'name' => '自転車',
        ],
        [
            'primary_category_id' => 3,
            'name' => '釣り',
        ],
        [
            'primary_category_id' => 3,
            'name' => 'ゴルフ',
        ],
        [
            'primary_category_id' => 3,
            'name' => '全てのスポーツ・アウトドア',
        ],
        [
            'primary_category_id' => 4,
            'name' => 'キッチン家電',
        ],
        [
            'primary_category_id' => 4,
            'name' => '日用家電',
        ],
        [
            'primary_category_id' => 4,
            'name' => 'カメラ・ビデオカメラ',
        ],
        [
            'primary_category_id' => 4,
            'name' => '全ての家電・カメラ類',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'パソコン・タブレット',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'テレビ・モニター',
        ],
        [
            'primary_category_id' => 5,
            'name' => '無線LAN・インターネット機器',
        ],
        [
            'primary_category_id' => 5,
            'name' => 'キーボード・マウス・入力機器',
        ],
        [
            'primary_category_id' => 6,
            'name' => '本',
        ],
        [
            'primary_category_id' => 6,
            'name' => '漫画',
        ],
        [
            'primary_category_id' => 6,
            'name' => '雑誌',
        ],
        [
            'primary_category_id' => 6,
            'name' => '文書',
        ],
    ]);
    }
}
