<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/grupousuario/index', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'index']);
Route::get('/grupousuario/create', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'create']);
Route::post('/grupousuario/store', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'store']);
Route::get('/grupousuario/edit/{idgrupousuario}', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'edit']);
Route::post('/grupousuario/update', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'update']);
Route::get('/grupousuario/show/{idgrupousuario}', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'show']);
Route::post('/grupousuario/delete/{idgrupousuario}', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'destroy']);

Route::get('/grupousuario/getformulario/{idgrupousuario}', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'getformulario']);
Route::post('/grupousuario/asignarformulario', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'asignarformulario']);


Route::get('/formulario/index', [App\Http\Controllers\Seguridad\FormularioController::class, 'index']);
Route::get('/formulario/create', [App\Http\Controllers\Seguridad\FormularioController::class, 'create']);
Route::post('/formulario/store', [App\Http\Controllers\Seguridad\FormularioController::class, 'store']);
Route::get('/formulario/edit/{idformulario}', [App\Http\Controllers\Seguridad\FormularioController::class, 'edit']);
Route::post('/formulario/update', [App\Http\Controllers\Seguridad\FormularioController::class, 'update']);
Route::get('/formulario/show/{idformulario}', [App\Http\Controllers\Seguridad\FormularioController::class, 'show']);
Route::post('/formulario/delete/{idformulario}', [App\Http\Controllers\Seguridad\FormularioController::class, 'destroy']);

Route::get('/usuario/index', [App\Http\Controllers\Seguridad\UsuarioController::class, 'index']);
Route::get('/usuario/create', [App\Http\Controllers\Seguridad\UsuarioController::class, 'create']);
Route::post('/usuario/store', [App\Http\Controllers\Seguridad\UsuarioController::class, 'store']);
Route::get('/usuario/edit/{idusuario}', [App\Http\Controllers\Seguridad\UsuarioController::class, 'edit']);
Route::post('/usuario/update', [App\Http\Controllers\Seguridad\UsuarioController::class, 'update']);
Route::get('/usuario/show/{idusuario}', [App\Http\Controllers\Seguridad\UsuarioController::class, 'show']);
Route::post('/usuario/delete/{idusuario}', [App\Http\Controllers\Seguridad\UsuarioController::class, 'destroy']);

