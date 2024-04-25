<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Shrouk/{id}', function ($id) {
    return 'welcome to my first web site ' . $id;
});