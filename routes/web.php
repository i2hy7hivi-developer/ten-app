<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('helper', function () {
    // Using the CommonHelper class
    \App\Helpers\CommonHelper::pred('Hello, this is a test message.');
    // return view('helper');
});
