<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create('en_US');

        foreach (range(1, 10) as $index) {
            DB::table('projects')->insert([
                "projectname" => $faker->word,
                "manager" => $faker->name,
                "numberofmembers" => rand(1, 10),
                "goals" => $faker->sentence,
                "description" => $faker->paragraph,
                "projectreviews" => $faker->sentence,
                "authorreview" => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
