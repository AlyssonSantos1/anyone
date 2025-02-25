<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SquadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Squad::create([
            "teammanager" => 'Ashley Cooker',
            "numberofmembers" => '11',
            "role" => 'Software Engineer',
            "hierarchy" => 'Associate',
            "currentproject" => 'The future of chatgpt',
            "reviewsofsquad" =>'The squad is excelent'
        ]);
    }
}
