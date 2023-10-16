<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('/computer', [App\Http\Controllers\ComputerController::class, 'store'])->name('computer.store');
    Route::get('/computer/overview', [App\Http\Controllers\ComputerController::class, 'overview'])->name('computer.overview');
    Route::get('/computer/edit/{id}', [App\Http\Controllers\ComputerController::class, 'edit'])->name('computer.edit');
    Route::get('/computer/create', [App\Http\Controllers\ComputerController::class, 'create'])->name('computer.create');
    Route::delete('/computer/{id}/delete', [App\Http\Controllers\ComputerController::class, 'delete'])->name('computer.delete');
    Route::put('/computer/update/{id}', [App\Http\Controllers\ComputerController::class, 'update'])->name('computer.update');

});

