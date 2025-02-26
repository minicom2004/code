<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'poster' => $this->faker->imageUrl(),
            'intro' => $this->faker->text(200), // Giới hạn độ dài intro
            'release_date' => $this->faker->date,
            'genre_id' => rand(1, 4), // Tạo liên kết ngẫu nhiên tới thể loại
        ];
    }
}
