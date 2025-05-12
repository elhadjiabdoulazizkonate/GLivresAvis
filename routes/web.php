<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::post('/reviews', [ReviewController::class, 'store']);
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/users', [UserController::class, 'index']);
Route::fallback(function () {
    return view('errors.404'); 
});
