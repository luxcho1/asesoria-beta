<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Chatbot;
use App\Http\Controllers\ChatbotEconomicoController; 
use App\Http\Controllers\Chatbot3Controller;
use App\Http\Controllers\ChatbotLaboralController;
use App\Http\Controllers\ChatbotPenalController;
use App\Http\Controllers\ChatbotCivilController;
use App\Http\Controllers\ChatbotTributarioController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chatbot', Chatbot::class);

//version 1.1
Route::get('/chatbot2', function () {
    return view('chatbot2');
})->middleware('auth');

Route::post('/chatbot2/submit', [ChatbotEconomicoController::class, 'submit'])->name('chatbot2.submit')->middleware('auth');

//version 1.2
Route::get('/chatbot3', function () {
    return view('chatbot3');
})->middleware('auth');

Route::post('/chatbot3', [Chatbot3Controller::class, 'submit'])->name('chatbot3.submit')->middleware('auth');

//version 1.3
Route::get('/chatbot-laboral', function () {
    return view('chatbot_laboral');
})->middleware('auth');

Route::post('/chatbot-laboral', [ChatbotLaboralController::class, 'submit'])->name('chatbot.submit')->middleware('auth');

//version 1.4
Route::get('/chatbot-penal', function () {
    return view('chatbot_penal');
})->middleware('auth');

Route::post('/chatbot-penal', [ChatbotPenalController::class, 'submit'])->name('chatbot_penal.submit')->middleware('auth');

//version 1.5
Route::get('/chatbot-civil', function () {
    return view('chatbot_civil');
})->middleware('auth');

Route::post('/chatbot-civil', [ChatbotCivilController::class, 'submit'])->name('chatbot_civil.submit')->middleware('auth');

//version 1.6
Route::get('/chatbot-tributario', function () {
    return view('chatbot_tributario');
})->middleware('auth');

Route::post('/chatbot-tributario', [ChatbotTributarioController::class, 'submit'])->name('chatbot_tributario.submit')->middleware('auth');
