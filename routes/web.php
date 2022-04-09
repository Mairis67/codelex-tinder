<?php

use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/profile/upload', [PictureController::class, 'index'])->name('upload');
Route::post('/profile/upload', [PictureController::class, 'store']);

require __DIR__.'/auth.php';
