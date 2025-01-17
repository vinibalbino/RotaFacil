<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorista>
 */
class MotoristaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'data_nascimento' => fake()->date('Y-m-d', now()->subYears(18)->toDateString()),
            'numero_cnh' => fake()->unique()->numerify('##########'),
        ];
    }
}
