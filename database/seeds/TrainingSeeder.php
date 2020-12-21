<?php

use App\Training;
use App\User;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'title' => "Program numer 1",
            'coach_id' => 1
        ]);

        DB::table('trainings')->insert([
            'title' => "Program numer 2",
            'coach_id' => 1
        ]);
        
        $training = Training::first();
        $training->users()->attach(User::first());

        $training = Training::first();
        $training->users()->attach(User::latest()->first());
    }
}
