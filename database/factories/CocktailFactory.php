<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cocktail;

class CocktailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cocktail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'recipe' => collect(
                [
                    [
                        'value' => fake()->text(40),
                    ],
                    [
                        'value' => fake()->text(40),
                    ],
                    [
                        'value' => fake()->text(40),
                    ],
                ]
            ),
            'description' => fake()->text(),
        ];
    }
}
