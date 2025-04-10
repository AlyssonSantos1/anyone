<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Squad;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            MembersTableSeeder::class,
            ProjectsTableSeeder::class,
            SquadsTableSeeder::class,
        ]);
    }
}
