<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController@today')->name('dashboard.today');

    Route::get('shops', 'ShopController@index')->name('shops.index');
    Route::get('devices', 'DeviceController@index')->name('devices.index');

    Route::get('zones', 'ZoneController@index')->name('zones.index');
//    Route::get('zones/create', 'ZoneController@create')->name('zones.create');
    Route::post('zones/', 'ZoneController@store')->name('zones.store');
    Route::get('zones/{zone}/edit', 'ZoneController@edit')->name('zones.edit');
    Route::put('zones/{zone}', 'ZoneController@update')->name('zones.update');
    Route::delete('zones/{zone}/edit', 'ZoneController@destroy')->name('zones.destroy');

});


