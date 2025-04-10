<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array

    {
        $faker = Faker::create('en_US');

        return [
            "projectname" => $faker->word,        
            "manager" => $faker->name,              
            "numberofmembers" => rand(1, 10),       
            "goals" => $faker->sentence,           
            "description" => $faker->paragraph,    
            "reviews" => $faker->sentence,         
            "authorreview" => $faker->name,        
        ];
    }
}
