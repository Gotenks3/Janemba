<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'user_id' => 1,
                'secondary_category_id' => 15,
                'name' => 'ブロリー()',
                'content' => '概要 劇場版『ドラゴンボール超 ブロリー』にてゴジータがブロリーを倒す為、超サイヤ人ブルーに変身した姿。 この名称は作中では名乗っておらずファンによる呼び名で、由来は同作品に登場するベジットが超サイヤ人ブルーに変身した際に名乗った「ベジットブルー」から取っている。',
                'image1' => 'furiza.jpeg',
                'state' => 1,
                'price' => 9000,
                'is_selling' => 1,
            ],
            [
                'user_id' => 1,
                'secondary_category_id' => 4,
                'name' => 'フリーザ()',
                'content' => '概要 劇場版『ドラゴンボール超 ブロリー』にてゴジータがブロリーを倒す為、超サイヤ人ブルーに変身した姿。 この名称は作中では名乗っておらずファンによる呼び名で、由来は同作品に登場するベジットが超サイヤ人ブルーに変身した際に名乗った「ベジットブルー」から取っている。',
                'image1' => 'furiza.jpeg',
                'state' => 1,
                'price' => 9000,
                'is_selling' => 1,
            ]
        ]);
    }
}
