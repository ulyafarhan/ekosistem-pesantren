<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        $judul = $this->faker->sentence();
        return [
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'isi_konten' => $this->faker->paragraphs(3, true),
            'status' => 'published',
        ];
    }
}