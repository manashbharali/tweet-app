<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\AuthorsController;

Route::post('/tweets', [TweetsController::class, 'store'])->name('tweet.store');
Route::patch('/tweets/{tweet}', [TweetsController::class, 'update'])->name('tweet.update');
Route::delete('/tweets/{tweet}', [TweetsController::class, 'destroy'])->name('tweet.delete');


Route::post('/authors', [AuthorsController::class, 'store'])->name('author.store');
