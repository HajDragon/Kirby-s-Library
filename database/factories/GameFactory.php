<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'developer' => fake()->company(),
            'genre' => fake()->randomElement(['Action', 'Adventure', 'RPG', 'Strategy', 'Shooter', 'Sports']),
            'playtime' => fake()->numberBetween(1, 500),
            'release_date' => fake()->date(),
            'image_url' => 'https://picsum.photos/seed/'.fake()->uuid().'/200/200',
        ];
    }
}
