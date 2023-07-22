<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Karmand;
use App\Models\Marzakan;
use App\Models\Rule;
use App\Models\sardanikar;
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

        Marzakan::factory(10)->create();

        $rules = ['superadmin', 'sarparshtyar', 'karmand', 'raport'];
        foreach ($rules as $rule) {
            Rule::factory()->create([
                'rule' => $rule,
            ]);
        }

        User::factory()->create([
            'name' => 'superadmin',
            'username' => 'admin',
            'rule_id' => 1,
            'marz_id' => 1,
        ]);
        User::factory()->create([
            'name' => 'halo',
            'username' => 'halo',
            'rule_id' => 2,
            'marz_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'shad',
            'username' => 'shad',
            'rule_id' => 3,
            'marz_id' => 3,
        ]);
        User::factory()->create([
            'name' => 'k zmnako',
            'username' => 'summary',
            'marz_id' => 4,
        ]);


        // User::factory(20)->create();


        // Sarparshtyar::factory(10)->create();

        // Karmand::factory(10)->create();

        // sardanikar::factory(20)->create();




    }
}
