<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsControllers;

Route::post('/tweets', [TweetsControllers::class, 'store'])->name('tweet.store');
Route::patch('/tweets/{tweet}', [TweetsControllers::class, 'update'])->name('tweet.update');
