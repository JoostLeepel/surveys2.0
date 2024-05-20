<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Survey; // Voeg deze regel toe om de Survey model te kunnen gebruiken

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Maak een survey aan
        $survey = Survey::create([
            'title' => 'General Knowledge',
            'description' => 'A survey to test your general knowledge.'
        ]);

        // Voeg vragen toe aan de survey
        if ($survey) {
            $survey->questions()->createMany([
                [
                    'question_text' => 'Wat is de hoofdstad van Frankrijk?',
                    'options' => ['A. Berlijn', 'B. Madrid', 'C. Parijs', 'D. Rome'],
                    'correct_answer' => 'C'
                ],
                // Andere vragen hier...
            ]);
        }
    }
}
