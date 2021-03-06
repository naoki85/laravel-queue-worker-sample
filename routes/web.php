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

Route::get('/', [\App\Http\Controllers\CsvController::class, 'index'])->name('csv.index');
Route::post('/import', [\App\Http\Controllers\CsvController::class, 'import'])->name('csv.import');
Route::post('/enqueue_to_db', [\App\Http\Controllers\CsvController::class, 'enqueueToDatabase'])->name('csv.enqueue_to_database');
Route::get('/complete', [\App\Http\Controllers\CsvController::class, 'complete'])->name('csv.complete');
