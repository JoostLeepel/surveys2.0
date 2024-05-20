<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions.*.text' => 'required|string|max:255',
            'questions.*.options.*' => 'required|string|max:255',
        ]);

        $survey = Survey::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        foreach ($validatedData['questions'] as $questionData) {
            $survey->questions()->create([
                'question_text' => $questionData['text'],
                'options' => json_encode($questionData['options']),
            ]);
        }

        return redirect()->route('surveys.index')->with('success', 'Survey created successfully.');
    }

    public function show($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->load('questions');
        return view('surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        $survey->load('questions');
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions.*.text' => 'required|string|max:255',
            'questions.*.options.*' => 'required|string|max:255',
        ]);

        $survey->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        foreach ($validatedData['questions'] as $index => $questionData) {
            $question = $survey->questions[$index];
            $question->update([
                'question_text' => $questionData['text'],
                'options' => json_encode($questionData['options']),
            ]);
        }

        return redirect()->route('surveys.index')->with('success', 'Survey updated successfully');
    }

    public function destroy(Survey $survey)
    {
        $survey->questions()->delete(); // Delete associated questions first
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted successfully.');
    }
    public function home()
    {
        $surveys = Survey::all();
        return view('home', compact('surveys'));
    }
    public function showCustomerSurveyForm(Survey $survey)
{
    return view('customer_survey_form', compact('survey'));
}
public function createQuestionForm()
{
    return view('create_question');
}

public function storeQuestion(Request $request)
{
    $validatedData = $request->validate([
        'question_text' => 'required|string|max:255',
        'options' => 'required|string',
    ]);

    // Verwerk en sla de vraag op in de database
    // Hier kun je de logica toevoegen om de vraag op te slaan in de database

    return redirect()->back()->with('success', 'Question created successfully.');
}
public function submitCustomerSurvey(Request $request, Survey $survey)
{
    // Verwerk het ingediende formulier hier...

    // Redirect naar de homepagina met een succesbericht
    return redirect()->route('home')->with('success', 'Bedankt voor het invullen van de enquête!');
}

}
