<?php

namespace Database\Factories;

use App\Models\Sarparshtyar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karmand>
 */
class KarmandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sarparshtyar_id'=> Sarparshtyar::factory()->create(),
            'name'=>fake()->unique()->name(),
            'phone'=>fake()->unique()->phoneNumber(),
        ];
    }
}
