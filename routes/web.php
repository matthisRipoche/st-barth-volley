<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/actu', [PublicController::class, 'actu'])->name('actu');
Route::get('/bureau', [PublicController::class, 'bureau'])->name('bureau');
Route::get('/equipes', [PublicController::class, 'equipes'])->name('equipes');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
