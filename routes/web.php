<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function(){
    return view('login');
});

Route::get('esqueci_a_senha', function(){
    return view('forgot_password');
});

Route::get('nova_senha', function(){
    return view('new_password');
});

Route::get('/', function () {
    return view('index');
});
