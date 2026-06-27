<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company().' Game Store',
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'store_type' => $this->faker->randomElement(['Physical', 'Digital', 'Hybrid']),
            'is_active' => true,
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
