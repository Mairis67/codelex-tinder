<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeOrDislikeController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/matches', [MatchesController::class, 'index'])->name('matches');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/profile/upload', [PictureController::class, 'index'])->name('upload');
Route::post('/profile/upload', [PictureController::class, 'store']);

Route::post('profile/like/{id}', [LikeOrDislikeController::class, 'like'])->name('like');
Route::post('profile/dislike/{id}', [LikeOrDislikeController::class, 'dislike'])->name('dislike');

require __DIR__.'/auth.php';
