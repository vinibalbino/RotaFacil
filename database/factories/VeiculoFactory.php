<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\FakeCar;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new FakeCar($this->faker));

        return [
            'modelo' => $this->faker->vehicleModel(),
            'ano' => fake()->year(),
            'data_aquisicao' => fake()->dateTimeBetween('-10 years', '-1 week'),
            'km_aquisicao' => fake()->randomNumber(8, false),
            'renavam' => $this->faker->unique()->regexify('[0-9]{11}'),
            'placa' => $this->faker->vehicleRegistration('[A-Z]{3}[0-9]{4}'), // ABC1234
        ];
    }
}
