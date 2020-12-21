<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(TrainingSeeder::class);
        $this->call(ExerciseSeeder::class);
    }
}
