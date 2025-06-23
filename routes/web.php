<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('public-site.home');
Route::get('/actu', [PublicController::class, 'actu'])->name('public-site.actu');
Route::get('/bureau', [PublicController::class, 'bureau'])->name('public-site.bureau');
Route::get('/equipes', [PublicController::class, 'equipes'])->name('public-site.equipes');
Route::get('/contact', [PublicController::class, 'contact'])->name('public-site.contact');
