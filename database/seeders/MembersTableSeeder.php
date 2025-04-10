<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        Member::create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(), 
            'password' => \Illuminate\Support\Facades\Hash::make('Living'),
            'role' => $faker->randomElement(['Developer', 'Engineer', 'SQL Engineer', 'Devops Enginner']),
            'hierarchy' => $faker->randomElement(['Junior', 'Mid-Level', 'Senior']),
            'insertedproject' => $faker->word(),
            'personalreviews' => $faker->sentence(),
            'ownerofreview' => $faker->name(),
        ]);

        Member::factory(10)->create();
    }
}
