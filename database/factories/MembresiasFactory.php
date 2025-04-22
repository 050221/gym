<?php

namespace Database\Factories;

use App\Models\membresias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membresias>
 */
class MembresiasFactory extends Factory
{

    protected $model = membresias::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),                // Un nombre aleatorio para la membresía
            'descripcion' => $this->faker->sentence(),       // Descripción aleatoria
            'duracion_meses' => $this->faker->numberBetween(1, 24), // Duración aleatoria entre 1 y 12 meses
            'precio' => $this->faker->randomNumber(200, 6000), // Precio aleatorio entre 200 y 6000
        ];
    }
}
