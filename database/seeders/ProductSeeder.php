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
                'secondary_category_id' => 16,
                'name' => 'MacBook Pro(Mid 2012)',
                'content' => 'マックブック-プロ【MacBook Pro】
                米国アップル社が2006年に発表したノート型パソコンのシリーズ名。 MacBookの上位機種に位置づけられ、米国インテル社のCPUを初めて採用。 13、15、17インチの液晶ディスプレーを搭載するモデルがある。',
                'image1' => 'macbookpro1-1000.jpeg',
                'image2' => 'macbookpro4-1000.jpeg',
                'image3' => 'macbookpro9-1000.jpeg',
                'image4' => 'macbookpro11-1000.jpeg',
                'state' => 1,
                'price' => 90000,
                'is_selling' => 1,
            ],
            [
                'user_id' => 2,
                'secondary_category_id' => 11,
                'name' => 'コールマン (Coleman) インフィニティチェア',
                'content' => '●使用時サイズ:約92x69x110（h）cm（通常時）、約166x69x76（h）cm（リクライニング最大時）
                ●収納時/約15x69x90（h）cm
                ●重量:約8.8kg
                ●座面幅:約46cm
                ●座面高:約50cm（通常時）
                ●耐荷重:約100kg
                ●材質:シート／ポリエステル、フレーム／スチール',
                'image1' => 'coleman-11.jpeg',
                'image2' => 'coleman-2.jpeg',
                'image3' => 'coleman-3.jpeg',
                'image4' => 'coleman1.jpg',
                'state' => 1,
                'price' => 12800,
                'is_selling' => 2,
            ],
            [
            'user_id' => 3,
                'secondary_category_id' => 8,
                'name' => '"ARCN-A02JP"電動アシスト自転車',
                'content' => '〈スーパー73〉や〈コースト サイクルズ〉を扱う、レガリス社のオリジナルブランド
                レガリス社のオリジナルブランド〈アルコン〉の電動アシスト付き自転車。フロントとリアにサスペンションが付いたフルサスペンションモデルで、フワフワの乗り心地が最高。またコストパフォーマンスに優れているのもポイント。',
                'image1' => '0031.jpeg',
                'image2' => '40002_1.jpeg',
                'image3' => '40002_5.jpeg',
                'image4' => '40002_6.jpeg',
                'state' => 1,
                'price' => 230000,
                'is_selling' => 1,
            ]
        ]);
    }
}
