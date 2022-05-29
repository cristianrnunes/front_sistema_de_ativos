<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [loginController::class, 'index']);

Route::get('esqueci_a_senha', [loginController::class, 'forgotPassword']);

Route::get('nova_senha', [loginController::class, 'newPassword']);

Route::get('/', function () {
    return view('index');
});
