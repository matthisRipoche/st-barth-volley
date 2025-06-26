<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BO\BOUserController;
use App\Http\Controllers\BO\BOArticleController;


Route::get('/', [PublicController::class, 'home'])->name('public-site.home');
Route::get('/actu', [PublicController::class, 'actu'])->name('public-site.actu');
Route::get('/bureau', [PublicController::class, 'bureau'])->name('public-site.bureau');
Route::get('/equipes', [PublicController::class, 'equipes'])->name('public-site.equipes');
Route::get('/contact', [PublicController::class, 'contact'])->name('public-site.contact');

Route::get('/mentions-legales', [PublicController::class, 'mentionsLegales'])->name('public-site.mentions-legales');
Route::get('/plan-site', [PublicController::class, 'planSite'])->name('public-site.plan-site');
Route::get('/cookies', [PublicController::class, 'cookies'])->name('public-site.cookies');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', fn() => view('back-office.pages.dashboard'))->name('back-office.dashboard');

    Route::get('/users', [BOUserController::class, 'index'])->name('back-office.users.index');

    Route::get('/articles', [BOArticleController::class, 'index'])->name('back-office.articles.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
