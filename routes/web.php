<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'index'])->name('home');
Route::get('/game/{game:slug}', [GameController::class, 'show'])->name('game.show');
Route::get('/search', [GameController::class, 'search'])->name('game.search');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/language/{locale}', function (Request $request, string $locale) {
    abort_unless(array_key_exists($locale, config('languages', [])), 404);

    $request->session()->put('locale', $locale);
    cookie()->queue(cookie('locale', $locale, 60 * 24 * 365));

    return redirect()->back(fallback: route('home'));
})->name('language.switch');
