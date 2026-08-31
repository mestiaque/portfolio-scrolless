<?php
use Illuminate\Support\Facades\Route;
use ME\Pordfolio\Http\Controllers\PordfolioController;
use ME\Pordfolio\Http\Controllers\ProjectController;
use ME\Http\Middleware\LocaleMiddleware;

Route::get('/', [PordfolioController::class, 'index'])->middleware('activityLog')
     ->name('index');

// Hero scroll-frame keyframes, served directly from the package's bundled
// public/frames/ so no vendor:publish step is needed on deploy.
Route::get('/frames/{filename}', [PordfolioController::class, 'frame'])
     ->where('filename', 'frame-\d{3}\.webp')
     ->name('frames');

Route::get('/ptest', function () {
    return view('pordfolio::threejs');
});



Route::prefix('portfolio')->group(function () {
    Route::get('/space-explorer', fn () => view('pordfolio::space-explorer'));
    Route::get('/glass-luxury', fn () => view('pordfolio::glass-luxury'));
    Route::get('/cyberpunk-hacker', fn () => view('pordfolio::cyberpunk-hacker'));
    Route::get('/apple-minimal', fn () => view('pordfolio::apple-minimal'));
    Route::get('/storybook', fn () => view('pordfolio::storybook'));
    Route::get('/gaming-hud', fn () => view('pordfolio::gaming-hud'));
    Route::get('/nature-organic', fn () => view('pordfolio::nature-organic'));
    Route::get('/smart-city-dashboard', fn () => view('pordfolio::smart-city-dashboard'));
    Route::get('/y2k-retro', fn () => view('pordfolio::y2k-retro'));
    Route::get('/ai-jarvis-os', fn () => view('pordfolio::ai-jarvis-os'));
});

Route::get('/sitemap.xml', [PordfolioController::class, 'sitemap'])
    ->name('sitemap.xml');

Route::get('/robots.txt', [PordfolioController::class, 'robots'])
    ->name('robots.txt');



Route::middleware(['web', 'auth', LocaleMiddleware::class, 'activityLog'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('projects', ProjectController::class);
    });
});
