<?php

namespace Database\Factories;

use App\Models\Karmand;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sardanikar>
 */
class SardanikarFactory extends Factory
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
             'nickname'=>fake()->name(),
             'passport_number'=>fake()->numberBetween(100000, 10000000),
             'birth_date'=>fake()->date(),
             'gender'=>fake()->boolean(),
             'nation'=>fake()->name(),
             'phone'=>fake()->phoneNumber(),
             'purpose_of_coming'=>fake()->paragraph(),
             'address'=>fake()->address(),
             'img'=>fake()->imageUrl(640, 59, 'animal', true),
             'status'=>'coming',
             'mount_of_money'=>fake()->numberBetween(100, 10000),
             'targeted_person'=>fake()->name(),
             'no_of_visitors'=>fake()->numberBetween(1000, 10000),
             'passport_expire_date'=>fake()->date(),
             'issuing_authority'=>fake()->name(),
             'karmand_id'=>User::factory()->create(),
             'sarparshtyar_id'=>Sarparshtyar::factory()->create(),
        ];
    }
}
