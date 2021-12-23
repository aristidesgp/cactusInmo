<?php

use App\Http\Controllers\TareaController;
use App\Http\Livewire\Propiedads;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',Propiedads::class)->name('dashboard');
    Route::get('/dashboard/tareas/{propiedad}', [TareaController::class, 'index'])->name('tareas');    
});