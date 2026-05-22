<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('/', 'dashboard')->name('home');
    Route::resource('books', BookController::class);
});


require __DIR__.'/settings.php';
