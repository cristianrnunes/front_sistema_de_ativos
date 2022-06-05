<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\PainelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PainelController::class, 'index']);

Route::post('/auth', [loginController::class, 'auth']);

Route::get('/login', [loginController::class, 'index']);

Route::get('/logout' ,[loginController::class, 'logout']);

Route::get('esqueci_a_senha', [loginController::class, 'forgotPassword']);

Route::get('nova_senha', [loginController::class, 'newPassword']);


