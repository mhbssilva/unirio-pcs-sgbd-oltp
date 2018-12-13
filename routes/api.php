<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Rota de serviços de usuário
 */
Route::resource('/usuarios', 'UsuarioController');

/**
 * Rota de serviços de mensagens
 */
Route::resource('mensagens', 'MensagemController');

