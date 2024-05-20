<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Survey; // Voeg deze regel toe om de Survey model te kunnen gebruiken

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $survey = Survey::first(); // Ga ervan uit dat er al een survey is gemaakt

        if ($survey) {
            $survey->questions()->createMany([
                [
                    'question_text' => 'Wat is de hoofdstad van Frankrijk?',
                    'options' => json_encode(['A. Berlijn', 'B. Madrid', 'C. Parijs', 'D. Rome']),
                    'correct_answer' => 'C'
                ],
                [
                    'question_text' => 'Wie heeft "To Kill a Mockingbird" geschreven?',
                    'options' => json_encode(['A. Harper Lee', 'B. J.K. Rowling', 'C. Stephen King', 'D. Ernest Hemingway']),
                    'correct_answer' => 'A'
                ],
                [
                    'question_text' => 'Wat is het chemische symbool voor water?',
                    'options' => json_encode(['A. H2O', 'B. CO2', 'C. NaCl', 'D. O3']),
                    'correct_answer' => 'A'
                ],
                [
                    'question_text' => 'Wie heeft de Mona Lisa geschilderd?',
                    'options' => json_encode(['A. Leonardo da Vinci', 'B. Pablo Picasso', 'C. Vincent van Gogh', 'D. Claude Monet']),
                    'correct_answer' => 'A'
                ],
            ]);
        }
    }
}


