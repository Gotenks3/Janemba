<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PrimaryCategorySeeder::class,
            SecondaryCategorySeeder::class,
            ProductSeeder::class,
            ProfileSeeder::class,
            StockSeeder::class,
        ]);
    }
}
