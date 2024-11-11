<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membresias>
 */
class MembresiasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_membresia' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'duracion' => $this->faker->numberBetween(1, 12), 
            'precio' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
