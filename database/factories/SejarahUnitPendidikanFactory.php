<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SejarahUnitPendidikan>
 */
class SejarahUnitPendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sejarah_smp' => $this->faker->paragraphs(3, true),
            'sejarah_sma' => $this->faker->paragraphs(3, true),
        ];
    }
}