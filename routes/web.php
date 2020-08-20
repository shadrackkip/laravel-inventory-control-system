<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.auth.login');
});
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::fallback(function (){
    return view('pages.404');
});
