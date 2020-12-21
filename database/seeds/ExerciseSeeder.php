<?php

use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercises')->insert([
            'title' => "Wymachy",
            'training_id' => 1
        ]);
        DB::table('exercises')->insert([
            'title' => "Przysiady",
            'training_id' => 1
        ]);
        DB::table('exercises')->insert([
            'title' => "Skakanie",
            'training_id' => 1
        ]);
    }
}
