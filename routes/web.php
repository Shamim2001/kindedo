<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\FrontendController;


// Frontend routes
Route::as('front.')->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('index');
    Route::get('programs', [FrontendController::class, 'programs'])->name('programs');
    Route::get('program/{slug}', [FrontendController::class, 'programDetails'])->name('program.details');
    Route::get('teachers', [FrontendController::class, 'teachers'])->name('teacher.index');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('elements', [DashboardController::class, 'elements'])->name('dashboard.elements');
    // General
    Route::post('editor/image/upload', [DashboardController::class, 'imageUpload'])->name('editor.file.upload');

    Route::resource('slider', SliderController::class);

    Route::get('programs', [DashboardController::class, 'programs'])->name('program.index');
    Route::get('faq', [DashboardController::class, 'faqs'])->name('faq.index');


});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
