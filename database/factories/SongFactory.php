<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    protected $model = Song::class;

    public function definition()
    {
        return [
            'Title' => $this->faker->sentence(3), // Random 3-word title
            'Author' => Author::factory(),       // Random author name
            'Likes' => $this->faker->numberBetween(0, 10000), // Random likes count
            'Category' => Category::factory(),     // Random single word category
            'Ytlink' => $this->faker->url,        // Random YouTube link
        ];
    }
}
