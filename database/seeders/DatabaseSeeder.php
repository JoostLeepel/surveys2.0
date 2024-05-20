<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            \Database\Seeders\SurveySeeder::class,
            \Database\Seeders\QuestionSeeder::class,
        ]);
    }
}
