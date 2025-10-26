<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengurus>
 */
class PengurusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'jabatan' => $this->faker->randomElement(['Ketua Umum', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Kepala Sekolah SMP', 'Kepala Sekolah SMA']),
            'biografi_singkat' => $this->faker->paragraph(),
        ];
    }
}
