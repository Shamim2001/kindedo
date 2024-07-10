<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Frontend routes
Route::as('front.')->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('index');
    Route::get('programs', [FrontendController::class, 'programs'])->name('programs');
    Route::get('program/{slug}', [FrontendController::class, 'programDetails'])->name('program.details');
    Route::get('teachers', [FrontendController::class, 'teachers'])->name('teacher.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
