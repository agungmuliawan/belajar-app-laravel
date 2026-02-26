<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'    => fake()->name(),
            'nim'     => (string) fake()->unique()->numerify('2024####'),
            'jurusan' => fake()->randomElement([
                'Teknik Informatika',
                'Sistem Informasi',
                'Teknik Elektro',
                'Manajemen',
                'Akuntansi',
            ]),
        ];
    }
}
