<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::Create([
            "name" => 'Josef White',
            "email" => 'jwhite@email.com',
            "role" => 'Devops Engineer',
            "hierarchy" => 'InternalAdvisor', 
            "insertedproject" => 'The North Pole and your future',
            "personalreviews"=> 'Josef It is an excelent teammate',
            "ownerofreview"=> 'The Internal Advisor'
        ]);
    }
}
