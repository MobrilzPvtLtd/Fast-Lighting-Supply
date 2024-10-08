<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('install', 'InstallController@installation')->name('install.show');
Route::post('install', 'InstallController@install')->name('install.do');

Route::get('license', 'LicenseController@create')->name('license.create');
Route::post('license', 'LicenseController@store')->name('license.store');


Route::get('/password-changed', function () {
    Artisan::call('password:changed');
    $output = Artisan::output();
    return response()->json(['message' => 'Password changed.', 'output' => $output]);
});
