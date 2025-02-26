<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Hành Động'],
            ['name' => 'Phưu Lưu'],
            ['name' => 'Trinh Thám'],
            ['name' => 'Tình Cảm'],
        ]);
    }
}
