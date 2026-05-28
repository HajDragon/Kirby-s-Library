<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'books.index')->name('dashboard');
    Route::view('/', 'books.index')->name('home');
    Route::resource('books', BookController::class);

    Route::get('documents', static function () {
        return view('documents');
    })->name('documents');

});


require __DIR__.'/settings.php';
