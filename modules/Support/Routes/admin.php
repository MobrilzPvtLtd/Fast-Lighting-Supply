<?php

use Illuminate\Support\Facades\Route;


Route::get('sitemaps', [
    'as' => 'admin.sitemaps.create',
    'uses' => 'SitemapController@create',
//    'middleware' => 'can:admin.sliders.index',
]);


Route::post('sitemaps', [
    'as' => 'admin.sitemaps.store',
    'uses' => 'SitemapController@store',
    //    'middleware' => 'can:admin.sliders.index',
]);
