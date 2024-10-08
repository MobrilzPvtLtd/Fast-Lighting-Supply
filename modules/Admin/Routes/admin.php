<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');

Route::get('/sales-analytics', [
    'as' => 'admin.sales_analytics.index',
    'uses' => 'SalesAnalyticsController@index',
    'middleware' => 'can:admin.orders.index',
]);

// Header Section
Route::get('/header-section', 'HeaderSectionController@index')->name('admin.header-section.index');
Route::get('header-section/create', [
    'as' => 'admin.header-section.create',
    'uses' => 'HeaderSectionController@create',
    // 'middleware' => 'can:admin.header-section.create',
]);

Route::post('header-section', [
    'as' => 'admin.header-section.store',
    'uses' => 'HeaderSectionController@store',
    // 'middleware' => 'can:admin.header-section.create',
]);

Route::get('header-section/{id}/edit', [
    'as' => 'admin.header-section.edit',
    'uses' => 'HeaderSectionController@edit',
    // 'middleware' => 'can:admin.header-section.edit',
]);

Route::put('header-section/{id}', [
    'as' => 'admin.header-section.update',
    'uses' => 'HeaderSectionController@update',
    // 'middleware' => 'can:admin.header-section.edit',
]);

Route::delete('header-section/{ids?}', [
    'as' => 'admin.header-section.destroy',
    'uses' => 'HeaderSectionController@destroy',
    // 'middleware' => 'can:admin.header-section.destroy',
]);
