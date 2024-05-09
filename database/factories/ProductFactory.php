<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'verificate' => $this->faker->boolean,
            'saler' => '1',
            'imagePath' => '/storage/image/F3XCDFWbJbElJwe1KZNw3lhKwd2fl6NVef4ejQTm.png',
            'name' => $this->faker->word,
            'price' => $this->faker->randomNumber(5, false),
            'priceOld' => $this->faker->randomNumber(5, false),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'certificateId' => '1'
        ];
    }
}
