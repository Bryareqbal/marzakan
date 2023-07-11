<?php

namespace Database\Factories;

use App\Models\Marzakan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sarparshtyar>
 */
class SarparshtyarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'phone'=>fake()->phoneNumber(),
            'marz_id'=>Marzakan::factory()->create(),
        ];
    }
}
