<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;


Route::get('/', [PublicController::class, 'home'])->name('public-site.home');
Route::get('/actu', [PublicController::class, 'actu'])->name('public-site.actu');
Route::get('/bureau', [PublicController::class, 'bureau'])->name('public-site.bureau');
Route::get('/equipes', [PublicController::class, 'equipes'])->name('public-site.equipes');
Route::get('/contact', [PublicController::class, 'contact'])->name('public-site.contact');

Route::get('/mentions-legales', [PublicController::class, 'mentionsLegales'])->name('public-site.mentions-legales');
Route::get('/plan-site', [PublicController::class, 'planSite'])->name('public-site.plan-site');
Route::get('/cookies', [PublicController::class, 'cookies'])->name('public-site.cookies');



Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
