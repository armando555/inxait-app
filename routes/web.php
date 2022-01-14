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

Route::get('/', [App\Http\Controllers\UserController::class, 'get_all_users'])->name("home.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'get_all_users'])->name('home');
Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create_user'])->name('user.create');
Route::post('/cities', [App\Http\Controllers\UserController::class, 'cities'])->name('cities');
Route::get('/winner', [App\Http\Controllers\UserController::class, 'choose_winner'])->name('user.winner');
Route::get('/export', [App\Http\Controllers\UserController::class, 'export_excel'])->name('user.excel');
Route::get('/exportWinners', [App\Http\Controllers\UserController::class, 'export_excel_winners'])->name('winners.excel');


