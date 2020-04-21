<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController@today')->name('dashboard.today');

    Route::get('shops', 'ShopController@index')->name('shops.index');
    Route::get('devices', 'DeviceController@index')->name('devices.index');

});


