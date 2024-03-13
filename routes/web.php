<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


Route::get('/', [StudentController::class, 'index'])->name('index');
Route::post('/', [StudentController::class, 'store']);
Route::delete('/{id}', [StudentController::class, 'destroy']);
Route::inertia('create', 'Students/Create');