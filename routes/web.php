<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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


Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/testloadfile', [DashboardController::class, 'testLoadFile'])->name('testloadfile');
Route::post('/loadfile', [DashboardController::class, 'loadfile'])->name('loadfile');
Route::post('loadsheet', [DashboardController::class, 'loadSpreadsheet'])->name('loadsheet');

