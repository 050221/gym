<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Membresias;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suscripciones>
 */
class SuscripcionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fechaInicio = $this->faker->dateTimeBetween('-1 year', 'now');
        $fechaFin = Carbon::parse($fechaInicio)->addMonths($this->faker->numberBetween(1, 12));

        return [
            'user_id' => User::factory(),
            'membresia_id' => Membresias::factory(),
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
        ];
    }
}
