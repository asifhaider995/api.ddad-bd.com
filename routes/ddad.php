<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('forcast', 'DashboardController@forcast')->name('dashboard.forcast');
    Route::get('playlist', 'DashboardController@playlist')->name('dashboard.playlist');

    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/create', 'UserController@create')->name('users.create');
    Route::post('users/', 'UserController@store')->name('users.store');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');



    Route::get('accounting/index', 'AccountingController@index')->name('accounting.index');
    Route::get('shops', 'ShopController@index')->name('shops.index');
    Route::get('shops/create', 'ShopController@create')->name('shops.create');
    Route::post('shops/', 'ShopController@store')->name('shops.store');
    Route::get('shops/{shop}/edit', 'ShopController@edit')->name('shops.edit');
    Route::put('shops/{shop}', 'ShopController@update')->name('shops.update');
    Route::get('shops/{shop}', 'ShopController@show')->name('shops.show');
    Route::delete('shops/{shop}', 'ShopController@destroy')->name('shops.destroy');
    Route::post('shops/{shop}/make-payment', 'ShopController@makePayment')->name('shops.make-payment');

    Route::get('campaigns', 'CampaignController@index')->name('campaigns.index');
    Route::get('campaigns/create', 'CampaignController@create')->name('campaigns.create');
    Route::post('campaigns/', 'CampaignController@store')->name('campaigns.store');
    Route::get('campaigns/{campaign}/edit', 'CampaignController@edit')->name('campaigns.edit');
    Route::put('campaigns/{campaign}', 'CampaignController@update')->name('campaigns.update');
    Route::get('campaigns/{campaign}', 'CampaignController@show')->name('campaigns.show');
    Route::delete('campaigns/{campaign}', 'CampaignController@destroy')->name('campaigns.destroy');
    Route::post('campaigns/calculate', 'CampaignController@calculate')->name('campaigns.calculate');
    Route::get('campaigns/{campaign}/status/{status}', 'CampaignController@updateStatus')->name('campaigns.change-status');
    Route::post('campaigns/{campaign}/received-payment', 'CampaignController@addPaymentReceived')->name('campaigns.received-payment');




    Route::post('android-boxes/', 'AndroidBoxController@store')->name('android-boxes.store');
    Route::post('detectors/', 'DetectorController@store')->name('detectors.store');
    Route::post('tvs/', 'TVController@store')->name('tvs.store');

    Route::get('devices', 'DeviceController@index')->name('devices.index');
    Route::post('devices/store', 'DeviceController@store')->name('devices.store');
    Route::get('devices/{device}/edit', 'DeviceController@edit')->name('devices.edit');
    Route::put('devices/{device}', 'DeviceController@update')->name('devices.update');
    Route::delete('devices/{device}', 'DeviceController@destroy')->name('devices.delete');


    Route::get('isps', 'IspController@index')->name('isps.index');
    Route::post('isps/store', 'IspController@store')->name('isps.store');
    Route::get('isps/{isp}/edit', 'IspController@edit')->name('isps.edit');
    Route::put('isps/{isp}', 'IspController@update')->name('isps.update');
    Route::delete('isps/{isp}', 'IspController@destroy')->name('isps.delete');


    Route::get('zones', 'ZoneController@index')->name('zones.index');
    Route::post('zones/', 'ZoneController@store')->name('zones.store');
    Route::get('zones/{zone}/edit', 'ZoneController@edit')->name('zones.edit');
    Route::put('zones/{zone}', 'ZoneController@update')->name('zones.update');
    Route::delete('zones/{zone}', 'ZoneController@destroy')->name('zones.destroy');
    Route::get('zones/{zone}/{location}/detach', 'ZoneController@detachLocation')->name('zones.detach.location');
    Route::get('zones/{zone}/{location}/attach', 'ZoneController@attachLocation')->name('zones.attach.location');

});


