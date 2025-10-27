<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramDanFasilitas>
 */
class ProgramDanFasilitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'program_pendidikan' => $this->faker->paragraphs(3, true),
            'fasilitas' => $this->faker->paragraphs(3, true),
        ];
    }
}