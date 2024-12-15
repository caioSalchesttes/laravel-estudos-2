<?php

use App\Http\Controllers\{AlertController, AuthController, PortalController};
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'login'])->name('portal.login');
Route::get('/register', [PortalController::class, 'register'])->name('portal.register');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('alert', [AlertController::class, 'index'])->name('alert');
