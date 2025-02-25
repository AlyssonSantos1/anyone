<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Squad;

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
            "projectfocus" => 'How to found the Create an Eficient Software about the IA',
            "nameofwriterreview" => 'The associate',
            "reviewsofsquad" =>'The squad is excelent'
        ]);
    }
}
