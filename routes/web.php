<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\SectorContorller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Rota do painel
Route::get('/', [PainelController::class, 'index']);

// Rotas de autenticações
Route::post('/auth', [loginController::class, 'auth']);
Route::get('/login', [loginController::class, 'index']);
Route::get('/logout' ,[loginController::class, 'logout']);
Route::get('esqueci_a_senha', [loginController::class, 'forgotPassword']);
Route::get('nova_senha', [loginController::class, 'newPassword']);

//Rotas de usuários
Route::get('usuarios', [UserController::class, 'index']);
Route::get('adicionar_usuario', [UserController::class, 'viewAddUser']);
Route::post('criar_usuário', [UserController::class, 'createUser']);
Route::get('editar_usuario/{id}', [UserController::class, 'viewEditUser']);
Route::post('update_user', [UserController::class, 'editUser']);
Route::get('edit_usuer', [UserController::class, 'editUser']);
Route::get('deletar_usuario/{id}/{username}', [UserController::class, 'deleteUser']);

//Rotas de setores
Route::get('setores', [SectorContorller::class, 'index']);
Route::get('adicionar_setor', [SectorContorller::class, 'viewAddSectors']);
Route::post('criar_setor', [SectorContorller::class, 'createSectors']);
Route::get('editar_setor/{id}', [SectorContorller::class, 'viewEditSectors']);
Route::post('update_sector', [SectorContorller::class, 'editSectors']);
// Route::get('edit_sector', [SectorContorller::class, 'editSectors']);
Route::get('deletar_setor/{id}', [SectorContorller::class, 'deleteSector']);


