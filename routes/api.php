<?php

use App\Http\Controllers\API\ApiTareasControler;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dashboard/tareas/{id}', [ApiTareasControler::class, 'index'])->name('tareas');

Route::post('/dashboard/tareas/store', [ApiTareasControler::class, 'store'])->name('store');