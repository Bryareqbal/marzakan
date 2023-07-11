<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Karmand;
use App\Models\Marzakan;
use App\Models\Rule;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $rules = ['superadmin', 'admin', 'user'];
        foreach($rules as $rule) {
            Rule::factory()->create([
                'rule' =>$rule,
            ]);
        }

        User::factory()->create([
            'name' => 'superadmin',
            'username' => 'admin',
        ]);

        Marzakan::factory(24)->create();

        Sarparshtyar::factory(10)->create();

        Karmand::factory(10)->create();


    }
}
