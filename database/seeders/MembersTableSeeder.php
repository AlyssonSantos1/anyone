<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('en_US');

        Member::create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(), 
            'password' => \Illuminate\Support\Facades\Hash::make('Living'),
            'role' => $faker->randomElement(['Web Developer', 'Engineer', 'SQL Developer', 'Devops', 'CTO', 'TechLead']),
            'hierarchy' => $faker->randomElement(['Executive', 'Manager', 'Associate', 'InternalAdvisor', 'User']),
            'insertedproject' => $faker->word(),
            'personalreviews' => $faker->sentence(),
            'ownerofreview' => $faker->name(),
        ]);

        $members = [
            ['name' => 'Adam', 'email' => 'adam@example.com', 'role' => 'Software Engineer', 'hierarchy' => 'executive', 'insertedproject' => 'IA save the planet', 'personalreviews' => 'Excellent performance', 'ownerofreview' => 'Adam', 'password' => '12345'],
            ['name' => 'Sam Parks', 'email' => 'samparks@example.com', 'role' => 'Designer', 'hierarchy' => 'manager', 'insertedproject' => 'Fire in La', 'personalreviews' => 'Very creative', 'ownerofreview' => 'Sam Parks', 'password' => '123456'],
            ['name' => 'Ryan Dunn', 'email' => 'ryan@example.com', 'role' => 'Tester', 'hierarchy' => 'InternalAdvisor', 'insertedproject' => 'Project Z', 'personalreviews' => 'Good attention to detail', 'ownerofreview' => 'Ryan', 'password' => 'abc123'],
            ['name' => 'Evan Ryley', 'email' => 'evan@example.com', 'role' => 'Developer', 'hierarchy' => 'associate', 'insertedproject' => 'Project A', 'personalreviews' => 'Reliable and efficient', 'ownerofreview' => 'Ryley', 'password' => 'evan123'],
            ['name' => 'Bob Nelson', 'email' => 'bobn@example.com', 'role' => 'Project Manager', 'hierarchy' => 'user', 'insertedproject' => 'Project B', 'personalreviews' => 'Great leadership skills', 'ownerofreview' => 'Bob', 'password' => 'bob123'],
            ['name' => 'Sarah Sharper', 'email' => 'ssharper@example.com', 'role' => 'QA Engineer', 'hierarchy' => 'associate', 'insertedproject' => 'Project A', 'personalreviews' => 'Calm and Cold', 'ownerofreview' => 'Jean', 'password' => 'sarah123'],
            ['name' => 'Scott Paul', 'email' => 'paul@example.com', 'role' => 'SQL Developer', 'hierarchy' => 'associate', 'insertedproject' => 'Project A', 'personalreviews' => 'Introspective', 'ownerofreview' => 'Adam', 'password' => 'admin123']
        ];

        foreach ($members as $member) {
            $member['password'] = Hash::make($member['password']);
            Member::create($member);
        }

        Member::factory(10)->create();
    }
}
