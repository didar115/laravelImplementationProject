<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DidarController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();
Route::get('list', [DidarController::class, 'index'])->name('list');

Route::group(['middleware'=>'auth'],function() {
   
Route::get('add', [DidarController::class, 'create'])->name('add');
Route::post('store', [DidarController::class, 'store']);
Route::get('edit/{id}', [DidarController::class, 'edit'])->name('edit.id');
Route::post('update/{id}', [DidarController::class, 'update'])->name('update');
Route::get('delete/{id}', [DidarController::class, 'destroy'])->name('delete');
    
});

Route::get('/', function () {
    return redirect('list');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

