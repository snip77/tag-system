<?php

use Illuminate\Support\Facades\Route;


Route::resource('tags', 'TagController')->only([
    'index', 'show', 'store', 'update', 'destroy'
]);
