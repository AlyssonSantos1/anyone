<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    public function definition(): array
    {
        $faker = Faker::create('en_US');

        return [
            'name' => $faker->name(),  
            'email' => $faker->unique()->safeEmail(), 
            'password' => Hash::make('password'), 
            'role' => $faker->randomElement(['Developer', 'Engineer', 'SQL Engineer', 'Devops Engineer']),
            'hierarchy' => $faker->randomElement(['Junior', 'Mid-Level', 'Senior']),  
            'insertedproject' => $faker->word(), 
            'personalreviews' => $faker->sentence(), 
            'ownerofreview' => $faker->name(), 
        ];
    }
}
