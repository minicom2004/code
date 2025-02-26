<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ĐOẠN NÀY GỌI MODELS VOI CLASS CÓ TÊN LÀ MoviesModel.php 
        Movie::factory(50)->create();
    }
}
