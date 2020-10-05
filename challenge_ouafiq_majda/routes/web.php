<?php

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

use App\Http\Controllers\Qcontroller;
use App\Http\Controllers\Acontroller;

//route to get all the questions and display it.
Route::get('/', [Qcontroller::class, 'getQuestions']);
//route for adding a question in the DB.
Route::post('/questions/{id}/answers', [Qcontroller::class, 'storeQ']);
//route for getting the answers of a questions and diplay it.
Route::get('/questions/{id}/answers', [Acontroller::class, 'getAnswers']);
//route to add an answer of a question.
Route::post('/questions', [Acontroller::class, 'storeA'])->name('addanswer');
