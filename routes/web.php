<?php

use App\Http\Controllers\Users\UserPersonalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserPersonalController::class, 'index']);
Route::get('/{id}', [UserPersonalController::class, 'show'])->name('show-user');
Route::post('/add-user', [UserPersonalController::class, 'store'])->name('add-user');
Route::put('/update-user/{id}', [UserPersonalController::class, 'update'])->name('update-user');
Route::post('/delete-user/{id}', [UserPersonalController::class, 'destroy'])->name('delete-user');
