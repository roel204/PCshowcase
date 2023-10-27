<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController as CC;

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/computer/show/{id}', [CC::class, 'show'])->name('computer.show');
    Route::get('/computer/overview', [CC::class, 'overview'])->name('computer.overview');
    Route::get('/computer/edit/{id}', [CC::class, 'edit'])->name('computer.edit');
    Route::get('/computer/create', [CC::class, 'create'])->name('computer.create');
    Route::post('/computer/store', [CC::class, 'store'])->name('computer.store');
    Route::delete('/computer/delete/{id}', [CC::class, 'delete'])->name('computer.delete');
    Route::put('/computer/update/{id}', [CC::class, 'update'])->name('computer.update');
    Route::put('/computer/toggle-status/{id}', [CC::class, 'toggleStatus'])->name('computer.toggle-status');
    Route::post('/computer/show/{computer}', [CC::class, 'comment'])->name('computer.comment');

    //Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('check.admin');

});

