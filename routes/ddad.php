<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController@today')->name('dashboard.today');

    Route::get('shops', 'ShopController@index')->name('shops.index');
    Route::post('shops/', 'ShopController@store')->name('shops.store');
    Route::get('shops/{shop}/edit', 'ShopController@edit')->name('shops.edit');
    Route::put('shops/{shop}', 'ShopController@update')->name('shops.update');
    Route::delete('shops/{shop}', 'ShopController@destroy')->name('shops.destroy');

    Route::get('devices', 'DeviceController@index')->name('devices.index');

    Route::get('zones', 'ZoneController@index')->name('zones.index');
    Route::post('zones/', 'ZoneController@store')->name('zones.store');
    Route::get('zones/{zone}/edit', 'ZoneController@edit')->name('zones.edit');
    Route::put('zones/{zone}', 'ZoneController@update')->name('zones.update');
    Route::delete('zones/{zone}', 'ZoneController@destroy')->name('zones.destroy');

});


