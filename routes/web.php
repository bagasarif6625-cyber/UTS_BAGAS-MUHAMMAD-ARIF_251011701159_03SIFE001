<?php

use App\Http\Controllers\SnackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SnackController::class, 'index'])->name('snacks.index');
Route::get('/merek/{brand}', [SnackController::class, 'brand'])->name('snacks.brand');
Route::get('/snacks/{snack}', [SnackController::class, 'show'])->name('snacks.show');
