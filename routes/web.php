<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\PublicationController;

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/', [MembreController::class, 'index'])->name('home');
    Route::get('/membres/search', [MembreController::class, 'search'])->name('membres.search');
    Route::post('/membres/{id}/friend-request', [MembreController::class, 'sendFriendRequest'])->name('membres.friend-request');
    Route::post('/membres/{id}/accept-friend-request', [MembreController::class, 'acceptFriendRequest'])->name('membres.accept-friend-request');

    Route::post('/publications', [PublicationController::class, 'store'])->name('publications.store');
    Route::post('/publications/{id}/comment', [PublicationController::class, 'comment'])->name('publications.comment');
    Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
});
