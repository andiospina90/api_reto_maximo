<?php

use Illuminate\Database\Seeder;

class StudyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_level')->insert([

            [
                'name' => 'Entrenador fisico',
                'status' => 1,
            ],
            [
                'name' => 'Terapeuta',
                'status' => 1,
            ]
            
        ]
    );
    }
}
