<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\BO\BOUserController;
use App\Http\Controllers\BO\BOArticleController;


Route::get('/', [FrontController::class, 'home'])->name('front.home');

Route::get('/actu', [FrontController::class, 'actu'])->name('front.actu');
Route::get('/actu/{article}', [FrontController::class, 'singleArticle'])->name('front.single-article');

Route::get('/bureau', [FrontController::class, 'bureau'])->name('front.bureau');
Route::get('/equipes', [FrontController::class, 'equipes'])->name('front.equipes');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');

Route::get('/mentions-legales', [FrontController::class, 'mentionsLegales'])->name('front.mentions-legales');
Route::get('/plan-site', [FrontController::class, 'planSite'])->name('front.plan-site');
Route::get('/cookies', [FrontController::class, 'cookies'])->name('front.cookies');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', fn() => view('back-office.pages.dashboard'))->name('back-office.dashboard');

    Route::get('/users', [BOUserController::class, 'index'])->name('back-office.users.index');
    Route::get('/users/create', [BOUserController::class, 'create'])->name('back-office.users.create');
    Route::post('/users', [BOUserController::class, 'store'])->name('back-office.users.store');
    Route::get('/users/{user}', [BOUserController::class, 'show'])->name('back-office.users.show');
    Route::put('/users/{user}', [BOUserController::class, 'update'])->name('back-office.users.update');
    Route::delete('/users/{user}', [BOUserController::class, 'destroy'])->name('back-office.users.destroy');

    Route::get('/articles', [BOArticleController::class, 'index'])->name('back-office.articles.index');
    Route::get('/articles/create', [BOArticleController::class, 'create'])->name('back-office.articles.create');
    Route::get('/articles/{article}', [BOArticleController::class, 'show'])->name('back-office.articles.show');
    Route::post('/articles', [BOArticleController::class, 'store'])->name('back-office.articles.store');
    Route::put('/articles/{article}', [BOArticleController::class, 'update'])->name('back-office.articles.update');
    Route::delete('/articles/{article}', [BOArticleController::class, 'delete'])->name('back-office.articles.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
