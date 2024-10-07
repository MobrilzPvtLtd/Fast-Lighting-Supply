<?php

use Illuminate\Support\Facades\Route;

Route::get('menus', [
    'as' => 'admin.menus.index',
    'uses' => 'MenuController@index',
    'middleware' => 'can:admin.menus.index',
]);

Route::get('menus/index/table', [
    'as' => 'admin.menus.table',
    'uses' => 'MenuController@table',
    'middleware' => 'can:admin.menus.index',
]);

Route::get('menus/create', [
    'as' => 'admin.menus.create',
    'uses' => 'MenuController@create',
    'middleware' => 'can:admin.menus.create',
]);

Route::post('menus', [
    'as' => 'admin.menus.store',
    'uses' => 'MenuController@store',
    'middleware' => 'can:admin.menus.create',
]);

Route::get('menus/{id}/edit', [
    'as' => 'admin.menus.edit',
    'uses' => 'MenuController@edit',
    'middleware' => 'can:admin.menus.edit',
]);

Route::put('menus/{id}', [
    'as' => 'admin.menus.update',
    'uses' => 'MenuController@update',
    'middleware' => 'can:admin.menus.edit',
]);

Route::delete('menus/{ids?}', [
    'as' => 'admin.menus.destroy',
    'uses' => 'MenuController@destroy',
    'middleware' => 'can:admin.menus.destroy',
]);

Route::get('menus/{menuId?}/items/create', [
    'as' => 'admin.menus.items.create',
    'uses' => 'MenuItemController@create',
    'middleware' => 'can:admin.menu_items.create',
]);

Route::post('menus/{menuId}/items', [
    'as' => 'admin.menus.items.store',
    'uses' => 'MenuItemController@store',
    'middleware' => 'can:admin.menu_items.create',
]);

Route::get('menus/{menuId}/items/{id}/edit', [
    'as' => 'admin.menus.items.edit',
    'uses' => 'MenuItemController@edit',
    'middleware' => 'can:admin.menu_items.edit',
]);

Route::put('menus/{menuId}/items/{id}', [
    'as' => 'admin.menus.items.update',
    'uses' => 'MenuItemController@update',
    'middleware' => 'can:admin.menu_items.edit',
]);

Route::delete('menus/items/{id}', [
    'as' => 'admin.menus.items.destroy',
    'uses' => 'MenuItemController@destroy',
    'middleware' => 'can:admin.menu_items.destroy',
]);

Route::put('menus/items/order', [
    'as' => 'admin.menus.items.order.update',
    'uses' => 'MenuItemOrderController@update',
    'middleware' => 'can:admin.menu_items.edit',
]);

// Why Choose Us routes
Route::get('why-choose-us', [
    'as' => 'admin.why-choose-us.index',
    'uses' => 'WhyChooseUsController@index',
    // 'middleware' => 'can:admin.why-choose-us.index',
]);

Route::get('why-choose-us/create', [
    'as' => 'admin.why-choose-us.create',
    'uses' => 'WhyChooseUsController@create',
    // 'middleware' => 'can:admin.why-choose-us.create',
]);

Route::post('why-choose-us', [
    'as' => 'admin.why-choose-us.store',
    'uses' => 'WhyChooseUsController@store',
    // 'middleware' => 'can:admin.why-choose-us.create',
]);

Route::get('why-choose-us/{id}/edit', [
    'as' => 'admin.why-choose-us.edit',
    'uses' => 'WhyChooseUsController@edit',
    // 'middleware' => 'can:admin.why-choose-us.edit',
]);

Route::put('why-choose-us/{id}', [
    'as' => 'admin.why-choose-us.update',
    'uses' => 'WhyChooseUsController@update',
    // 'middleware' => 'can:admin.why-choose-us.edit',
]);

Route::delete('why-choose-us/{ids?}', [
    'as' => 'admin.why-choose-us.destroy',
    'uses' => 'WhyChooseUsController@destroy',
    // 'middleware' => 'can:admin.why-choose-us.destroy',
]);
