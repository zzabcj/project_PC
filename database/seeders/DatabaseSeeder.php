<?php

namespace Database\Seeders;

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
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(300)->create();
        \App\Models\Review::factory(1000)->create();
    }
}
