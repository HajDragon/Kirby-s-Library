<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'author'=>fake()->name(),
            'publisher'=>fake()->name(),
            'isbn'=>fake()->isbn10(),
            'release_date'=>fake()->date(),
            'library_id' =>Library::factory(),
            'image_url' => 'https://picsum.photos/seed/' . fake()->uuid() . '/200/200',
        ];
    }
}
