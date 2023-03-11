<?php

namespace Database\Factories;

use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;

class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Articles::class;
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'author' => $this->faker->email(),
            'description' => $this->faker->address()

        ];
    }
}
