<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\BO\BOUserController;
use App\Http\Controllers\BO\BOArticleController;
use App\Http\Controllers\BO\BOPageController;
use App\Http\Controllers\BO\BOMenuController;
use App\Http\Controllers\BO\BOSettingController;
use App\Models\Page;


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

    Route::get('/pages', [BOPageController::class, 'index'])->name('back-office.pages.index');
    Route::get('/pages/create', [BOPageController::class, 'create'])->name('back-office.pages.create');
    Route::post('/pages', [BOPageController::class, 'store'])->name('back-office.pages.store');
    Route::get('/pages/{page}', [BOPageController::class, 'show'])->name('back-office.pages.show');
    Route::put('/pages/{page}', [BOPageController::class, 'update'])->name('back-office.pages.update');
    Route::delete('/pages/{page}', [BOPageController::class, 'delete'])->name('back-office.pages.delete');

    Route::get('/menus', [BOMenuController::class, 'index'])->name('back-office.menus.index');
    Route::get('/menus/create', [BOMenuController::class, 'create'])->name('back-office.menus.create');
    Route::post('/menus', [BOMenuController::class, 'store'])->name('back-office.menus.store');
    Route::get('/menus/{menu}', [BOMenuController::class, 'show'])->name('back-office.menus.show');
    Route::put('/menus/{menu}', [BOMenuController::class, 'update'])->name('back-office.menus.update');
    Route::delete('/menus/{menu}', [BOMenuController::class, 'delete'])->name('back-office.menus.delete');

    Route::post('/menus/{menu}/items', [BOMenuController::class, 'addItem'])->name('back-office.menus.items.store');
    Route::delete('/menus/items/{item}', [BOMenuController::class, 'destroyItem'])->name('back-office.menus.items.destroy');

    Route::get('/setting', [BOSettingController::class, 'index'])->name('back-office.setting.index');
    Route::put('/setting', [BOSettingController::class, 'update'])->name('back-office.setting.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/{page:slug}', [FrontPageController::class, 'page'])
    ->name('front.page');
