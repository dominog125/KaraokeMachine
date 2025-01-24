<?php

namespace Database\Factories;

use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    protected $model = Request::class;

    public function definition()
    {
        return [
            'IDSong' => 1,
            'RowPr' => $this->faker->numberBetween(1, 100),
            'TimePr' => $this->faker->dateTime,
            'ChangeType' => $this->faker->randomElement(['change_text', 'new_text']),
            'UserID' => 1,
            'RowPrOld' => $this->faker->numberBetween(1, 100),
            'TimePrOld' => $this->faker->dateTime,
            'status' => $this->faker->randomElement(['pending', 'accepted', 'declined']),
        ];
    }
}
