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
                'nickname' => 'おっさん',
                'content' => '①こんにちは。暇つぶしにアプリを始めました。使わなくなった商品を販売していこうと思います。よろしくお願いします。',
                'icon' => 'ossan.jpeg',
                'prefecture' => 21,
                'gender' => 1,
                'age' => 19
            ],
            [
                'user_id' => '2',
                'nickname' => 'ルフィ',
                'content' => '②こんにちは。暇つぶしにアプリを始めました。使わなくなった商品を販売していこうと思います。よろしくお願いします。',
                'icon' => 'car.jpeg',
                'prefecture' => 5,
                'gender' => 2,
                'age' => 24
            ],
            [
                'user_id' => '3',
                'nickname' => 'ベジータ',
                'content' => '③こんにちは。暇つぶしにアプリを始めました。使わなくなった商品を販売していこうと思います。よろしくお願いします。',
                'icon' => 'woman.jpeg',
                'prefecture' => 9,
                'gender' => 1,
                'age' => 22
            ],
    ]);
    }
}
