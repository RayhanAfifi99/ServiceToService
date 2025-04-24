<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->numerify('2023####'),
            'nama' => $this->faker->name(),
            'prodi' => $this->faker->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Elektro']),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
