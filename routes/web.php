<?php

use App\Http\Controllers\{AlertController, AsavController, UnisinosController};
use Illuminate\Support\Facades\Route;

Route::get('/unisinos', [UnisinosController::class, 'index'])->name('unisinos.index');
Route::post('/unisinos', [UnisinosController::class, 'store'])->name('unisinos.store');

Route::get('/asav', [AsavController::class, 'index'])->name('asav.index');
Route::post('/asav', [AsavController::class, 'store'])->name('asav.store');

Route::get('alert', [AlertController::class, 'index'])->name('alert');