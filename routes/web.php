<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController as CC;

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

    Route::post('/computer', [CC::class, 'store'])->name('computer.store');
    Route::get('/computer/overview', [CC::class, 'overview'])->name('computer.overview');
    Route::get('/computer/edit/{id}', [CC::class, 'edit'])->name('computer.edit');
    Route::get('/computer/create', [CC::class, 'create'])->name('computer.create');
    Route::delete('/computer/{id}/delete', [CC::class, 'delete'])->name('computer.delete');
    Route::put('/computer/update/{id}', [CC::class, 'update'])->name('computer.update');

});

