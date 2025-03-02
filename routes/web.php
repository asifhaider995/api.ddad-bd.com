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

Route::redirect('/', '/login');
Route::redirect('/home', '/ddad/dashboard');

Auth::routes(['register' => false]);

Route::middleware(['web', 'auth'])
    ->prefix('configuration')
    ->namespace('Configuration')
    ->group(base_path('routes/configuration.php'));
