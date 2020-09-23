<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')
    ->group(function() {
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings', 'SettingController@store')->name('settings.store');
    Route::get('settings/update-seeder', 'SettingController@updateSeeder')->name('settings.update-seeder');

    Route::get('environments', 'EnvController@index')->name('environments.index');
    Route::post('environments', 'EnvController@store')->name('environments.store');

    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
    Route::get('/permissions/{permission}/attachable-users', 'PermissionController@attachableUsers')->name('permissions.attachable-users');
    Route::get('/permissions/{permission}/attach-user', 'PermissionController@attachUser')->name('permissions.attach-user');
    Route::get('/permissions/{permission}/detach-user', 'PermissionController@detachUser')->name('permissions.detach-user');
    Route::get('/permissions/{permission}/attachable-roles', 'PermissionController@attachableRoles')->name('permissions.attachable-roles');
    Route::get('/permissions/{permission}/attach-role', 'PermissionController@attachRole')->name('permissions.attach-role');
    Route::get('/permissions/{permission}/detach-role', 'PermissionController@detachRole')->name('permissions.detach-role');

    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::get('/roles/{role}/attachable-permissions', 'RoleController@attachablePermissions')->name('roles.attachable-permissions');
    Route::get('/roles/{role}/attach-permission', 'RoleController@attachPermission')->name('roles.attach-permission');
    Route::get('/roles/{role}/detach-permission', 'RoleController@detachPermission')->name('roles.detach-permission');
});
