<?php

use Illuminate\Support\Facades\Route;

Route::resource('tags', 'TagController')->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::post('product/{product}/insert/{tag}','ProductController@store');
Route::post('article/{article}/insert/{tag}','ArticleController@store');
