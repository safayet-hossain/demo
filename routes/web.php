<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/',[WebsiteController::class,'home'])->name('home.page');
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {return view('app');})->name('application');

Route::get('/abc', function () {return view('hello');})->name('hello');
Route::get('/123', function () {return view('practice');})->name('practice');

