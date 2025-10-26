<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TokohSejarahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'periode_jabatan' => '1990 - 2000',
            'kisah_historis' => $this->faker->paragraph(),
        ];
    }
}