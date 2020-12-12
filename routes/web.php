<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/tweets', [TweetsController::class, 'index'])->name('tweet.index');
Route::get('/tweets/create', [TweetsController::class, 'create'])->name('tweet.create');
Route::get('/tweets/{id}', [TweetsController::class, 'view'])->name('tweet.view');
Route::get('/tweets/edit', [TweetsController::class, 'edit'])->name('tweet.edit');

Route::post('/tweets', [TweetsController::class, 'store'])->name('tweet.store');
Route::patch('/tweets/{tweet}', [TweetsController::class, 'update'])->name('tweet.update');
Route::delete('/tweets/{tweet}', [TweetsController::class, 'destroy'])->name('tweet.delete');

