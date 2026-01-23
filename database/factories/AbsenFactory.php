<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absen>
 */
class AbsenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'kategori' => $this->faker->randomElement(['Hadir', 'Hadir Telat', 'Telat', 'Sakit', 'Izin']),
            'alasan' => $this->faker->sentence(),
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'status' => $this->faker->randomElement(['Diterima', 'Diterima', 'Diterima']),
        ];
    }
}
