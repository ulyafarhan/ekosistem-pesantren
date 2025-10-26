<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'file_media' => 'https://via.placeholder.com/640x480.png/00ff77?text=Gambar',
            'tipe' => 'foto',
        ];
    }
}