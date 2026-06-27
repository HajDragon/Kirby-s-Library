<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'games.index')->name('dashboard');
    Route::view('/', 'games.index')->name('home');
    Route::resource('games', GameController::class);
    Route::resource('stores', StoreController::class);

    Route::get('documents', static function () {
        return view('documents');
    })->name('documents');

});

require __DIR__.'/settings.php';
