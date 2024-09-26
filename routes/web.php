<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Chatbot;
use App\Http\Controllers\ChatbotEconomicoController; 
use App\Http\Controllers\Chatbot3Controller;
use App\Http\Controllers\ChatbotLaboralController;
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
});

Route::post('/chatbot2/submit', [ChatbotEconomicoController::class, 'submit'])->name('chatbot2.submit');

//version 1.2
Route::get('/chatbot3', function () {
    return view('chatbot3');
});

Route::post('/chatbot3', [Chatbot3Controller::class, 'submit'])->name('chatbot3.submit');

//version 1.3
Route::get('/chatbot-laboral', function () {
    return view('chatbot_laboral');
});

Route::post('/chatbot-laboral', [ChatbotLaboralController::class, 'submit'])->name('chatbot.submit');
