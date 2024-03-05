<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/games/mygames', [App\Http\Controllers\GameController::class, 'mygames'])->name('games.mygames');
    Route::post('/games/rentgame', [App\Http\Controllers\GameController::class,'rentgame'])->name('games.rentgame');
    Route::post('/games/returngame', [App\Http\Controllers\GameController::class,'returngame'])->name('games.returngame');
    Route::get('/games/myrentedgames', [App\Http\Controllers\GameController::class,'myRentedGames'])->name('games.myrentedgames');
    Route::get('games/rentedGame', [App\Http\Controllers\PdfController::class,'showPdfView'])->name('games.pdf');
});
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
Route::resource('/games', App\Http\Controllers\GameController::class)->middleware('verified');
Route::get('/users', [App\Http\Controllers\ProfileController::class, 'index'])->middleware(['auth', 'admin'])->name('users');

require __DIR__.'/auth.php';
