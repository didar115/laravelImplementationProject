<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DidarController;


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

Route::get('list', [DidarController::class, 'index'])->name('list');
Route::get('add', [DidarController::class, 'create'])->name('add');
Route::post('store', [DidarController::class, 'store']);
Route::get('edit/{id}', [DidarController::class, 'edit'])->name('edit.id');
Route::post('update/{id}', [DidarController::class, 'update'])->name('update');
Route::get('delete/{id}', [DidarController::class, 'destroy'])->name('delete');

