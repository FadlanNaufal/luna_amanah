<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('subcategories')->insert([
            ['category_id' => 1, 'name' => 'Haji Plus'],
            ['category_id' => 1, 'name' => 'Haji Furoda'],
            ['category_id' => 2, 'name' => 'Umrah Plus Aqsha'],
            ['category_id' => 2, 'name' => 'Umrah Plus Andalusia'],
            ['category_id' => 2, 'name' => 'Umrah Plus Dubai'],
            ['category_id' => 2, 'name' => 'Umrah Plus Turki'],
            ['category_id' => 2, 'name' => 'Umrah Plus'],
            ['category_id' => 3, 'name' => 'Badal Haji'],
            ['category_id' => 3, 'name' => 'Badal Umrah'],
            ['category_id' => 4, 'name' => 'Muslim Tour Turki'],
            ['category_id' => 4, 'name' => 'Muslim Tour Eropa'],
            ['category_id' => 4, 'name' => 'Muslim Tour Dubai'],
            ['category_id' => 4, 'name' => 'Muslim Tour Andalusia'],
        ]);
    }
}
