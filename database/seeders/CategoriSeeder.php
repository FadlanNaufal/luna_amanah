<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('categoris')->insert([
            ['name' => 'Haji'],
            ['name' => 'Umrah'],
            ['name' => 'Badal'],
            ['name' => 'Muslim Tour'],
        ]);
    }
}
