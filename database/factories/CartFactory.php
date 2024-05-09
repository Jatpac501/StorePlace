<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'userId' => $this->faker->numberBetween(1, 50),
            'userId' => '1',
            'productId' => $this->faker->numberBetween(1, 15),
            'count' => $this->faker->numberBetween(1, 10),
        ];
    }
}
