<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\surveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [SurveyController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/surveys', [surveyController::class, 'index'])->name('surveys.index');
    Route::get('/surveys/create', [surveyController::class, 'create'])->name('surveys.create');
    Route::post('/surveys', [surveyController::class, 'store'])->name('surveys.store');
    Route::get('/surveys/{survey}', [surveyController::class, 'show'])->name('surveys.show');
    Route::get('/surveys/{survey}/edit', [surveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/surveys/{survey}', [surveyController::class, 'update'])->name('surveys.update');
    Route::put('/surveys/{survey}', [SurveyController::class, 'update'])->name('survey.update');
    Route::delete('/surveys/{survey}', [surveyController::class, 'destroy'])->name('surveys.destroy');

    Route::get('/surveys/{survey}/fill', [SurveyController::class, 'showCustomerSurveyForm'])->name('show_customer_survey_form');
    Route::post('/surveys/{survey}/submit', [SurveyController::class, 'submitCustomerSurvey'])->name('submit_customer_survey');

    Route::get('/questions/create', [SurveyController::class, 'createQuestionForm'])->name('create_question_form');
    Route::post('/questions/store', [SurveyController::class, 'storeQuestion'])->name('store_question');
});

require __DIR__.'/auth.php';

