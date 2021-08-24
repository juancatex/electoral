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
 
Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
Route::post('/login', [App\Http\Controllers\AppMovil::class, 'login']); 
Route::middleware('auth:sanctum')->post('/regvoto', [App\Http\Controllers\AppMovil::class, 'regvoto']); 
Route::middleware('auth:sanctum')->post('/updateqrvoto', [App\Http\Controllers\AppMovil::class, 'updateqrvoto']); 
Route::get('/printvoto', [App\Http\Controllers\AppMovil::class, 'printvoto']);
// Route::get('/getCandidatosVoto', [App\Http\Controllers\AppMovil::class, 'getCandidatosVoto']);
// Route::get('/getfrentesVoto', [App\Http\Controllers\AppMovil::class, 'getfrentesVoto']);
Route::middleware('auth:sanctum')->get('/getCandidatosVoto', [App\Http\Controllers\AppMovil::class, 'getCandidatosVoto']);
Route::middleware('auth:sanctum')->get('/getfrentesVoto', [App\Http\Controllers\AppMovil::class, 'getfrentesVoto']);
Route::middleware('auth:sanctum')->get('/getfrentesVotomovil', [App\Http\Controllers\AppMovil::class, 'getfrentesVotomovil']);
