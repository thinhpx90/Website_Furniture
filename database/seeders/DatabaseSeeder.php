<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Carbon::setTestNow('2020-1-1');
        \App\Models\User::factory(500)->create();
        \App\Models\TypeProduct::factory(10)->create();
        \App\Models\Category::factory(30)->create();
        \App\Models\Supplier::factory(10)->create();
        \App\Models\Product::factory(300)->create();
        \App\Models\Image::factory(1500)->create();
        \App\Models\Slide::factory(5)->create();
        Carbon::setTestNow();
        \App\Models\Bill::factory(1500)->create();
        \App\Models\BillDetail::factory(4500)->create();
    }
}
