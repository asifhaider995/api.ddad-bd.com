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

Route::view('/', 'welcome')->name('abc');
Route::view('/home', 'home')->name('home')->middleware('auth');


Auth::routes();

Route::middleware(['web', 'auth'])
    ->prefix('configuration')
    ->namespace('Configuration')
    ->group(base_path('routes/configuration.php'));
