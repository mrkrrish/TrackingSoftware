<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'category_name'=>'Featured Offers',
            ],
            [
            'category_name' =>'Top Trending'
            ],
        ]);

    }
}
