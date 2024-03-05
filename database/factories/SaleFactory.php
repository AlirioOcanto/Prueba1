<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => $this->faker->numberBetween(1, 10),
            'model' => $this->faker->word(),
            'model_year' => $this->faker->year(),
            'version' => $this->faker->word(),
            'color' => $this->faker->colorName(),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
