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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/students', function () {
        return Inertia\Inertia::render('Students');
    })->name('students');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('api')->group(function(){
    Route::apiResource('students','App\Http\Controllers\StudentsController');
    Route::apiResource('courses','App\Http\Controllers\CoursesController');


});
