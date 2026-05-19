<?php
use Illuminate\Support\Facades\Route;
use ME\Pordfolio\Http\Controllers\PordfolioController;
use ME\Pordfolio\Http\Controllers\ProjectController;
use ME\Http\Middleware\LocaleMiddleware;

Route::get('/', [PordfolioController::class, 'index'])->middleware('activityLog')
     ->name('index');

Route::get('/sitemap.xml', [PordfolioController::class, 'sitemap'])
    ->name('sitemap.xml');

Route::get('/robots.txt', [PordfolioController::class, 'robots'])
    ->name('robots.txt');

Route::middleware(['web', 'auth', LocaleMiddleware::class, 'activityLog'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('projects', ProjectController::class);
    });
});
