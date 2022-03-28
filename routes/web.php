<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('topics', TopicController::class);
//    Route::resource('questions', QuestionController::class);
    Route::get('/topics/{topic}/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/topics/{topic}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/topics/{topic}/questions/store', [QuestionController::class, 'store'])->name('questions.store');

    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.delete');
    Route::put('/questions/{question}/update', [QuestionController::class, 'update'])->name('questions.update');

    Route::get('/questionset/{subject}/create',[QuestionController::class, 'genQuestionSet'])->name('questionset.create');
    Route::post('/questionset/store',[QuestionController::class, 'generateSet'])->name('questionset.store');
    Route::get('/questionset',[QuestionController::class, 'questionSetIndex'])->name('questionset.index');
    Route::get('/questionset/{questionset}/print',[QuestionController::class, 'print'])->name('questionset.print');
    Route::get('/questionset/{questionset}/show',[QuestionController::class, 'questionSetShow'])->name('questionset.show');
});
