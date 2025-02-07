<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'emel' => fake()->unique()->safeEmail(),
            'jantina' => fake()->randomElement(['Lelaki', 'Perempuan']),
            'no_telefon' => fake()->numerify('01########'), 
        ];
    }
}
