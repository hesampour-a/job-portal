<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\myJob;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'hesam',
            'email' => 'ali@hesam.com',
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $empoyers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            myJob::factory()->create([
                'employer_id' => $empoyers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $jobs = myJob::inRandomOrder()->take(rand(0, 4))->get();
            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'user_id' => $user->id,
                    'my_job_id' => $job->id
                ]);
            }
        }
    }
}
