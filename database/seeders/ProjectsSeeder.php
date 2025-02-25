<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::Create([
            "projectname" => 'Save the Planet',
            "manager" => 'Shawn Gibson',
            "numberofmembers" => '10',
            "goals" => 'Create a new Software to help the project',
            "description" => 'The project consists of developing software in Python to map endangered animals',
            "projectreviews" => 'The project has great potential in delivering secure software and clean code',
            "authorreview" => 'The Manager'

        ]);
    }
}
