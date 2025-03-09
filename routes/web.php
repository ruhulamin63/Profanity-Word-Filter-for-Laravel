<?php

use Illuminate\Support\Facades\Route;
use Blaspsoft\Blasp\Facades\Blasp;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checker', function () {
    $sentence = 'This is a fucking shit sentence';
    $check = Blasp::check($sentence);

    dd($check);
});
