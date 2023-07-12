<?php

namespace Database\Factories;

use App\Models\Marzakan;
use App\Models\User;
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
            'phone'=>fake()->phoneNumber(),
            'marz_id'=>Marzakan::factory()->create(),
            'user_id'=>User::factory()->create(),
        ];
    }
}
