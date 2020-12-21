<?php

use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coaches')->insert([
            'name' => "Józef Nowak",
        ]);
    }
}
