<?php
use Illuminate\Support\Facades\Route;
use ME\Pordfolio\Http\Controllers\PordfolioController;

Route::prefix('api')->post('/messages-store', [PordfolioController::class, 'storeMessage']);