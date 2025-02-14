<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Kinh dị'],
            ['name' => 'Lãng mạn'],
            ['name' => 'Hành động'],
            ['name' => 'Hoạt hình'],
            ['name' => 'Hài hước'],
        ]);
    }
}
