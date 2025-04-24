<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matkul;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matkul>
 */
class MatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Matkul::class;

    public function definition()
    {
        $days  = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        $start = $this->faker->time('H:i:s', '17:00:00');
        $end   = date('H:i:s', strtotime($start) + 3600 * $this->faker->numberBetween(1,3));

        return [
            'kode'       => 'M' . $this->faker->unique()->numberBetween(1000, 9999),
            'nama'       => $this->faker->words(3, true),
            'prodi'      => $this->faker->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Elektro']),
            'day'        => $this->faker->randomElement($days),
            'start_time' => $start,
            'end_time'   => $end,
        ];
    }
}
