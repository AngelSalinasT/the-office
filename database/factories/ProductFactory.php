<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            //
            'name'=> $this->faker->randomelement(['Mouse', 'Monitor', 'teclado']),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomFloat(2, 600, 4000)
        ];
    }
}
