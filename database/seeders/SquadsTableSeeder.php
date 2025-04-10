<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Squad;
use Faker\Factory as Faker;

class SquadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Squad::create([
            'teammanager' => 'John Doe', 
            'reviewsofsquad' => 'This is an excellent squad with great potential.',
        ]);

        for ($i = 0; $i < 10; $i++) {
            Squad::create([
                'teammanager' => $faker->name(),
                'reviewsofsquad' => $faker->sentence(),
            ]);
        }
    }
}
