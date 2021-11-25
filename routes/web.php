<?php

use App\Http\Controllers\QuestionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('index');
})->name('home');

Route::get('/AddQuestion', function () {
    return view('AddQuestion');
});

Route::get('/AddSubject', function () {
    return view('AddSubject');
});



Route::view('/AddTopic','AddTopic');

Route::view('/','Loginform');

Route::view('/Subview','Subview');

Route::view('/Qview','Qview');

Route::resource('questions', QuestionController::class);

