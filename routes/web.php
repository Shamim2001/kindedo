<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PromoController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Frontend\FrontendController;


// Frontend routes
Route::as('front.')->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('index');
    Route::get('programs', [FrontendController::class, 'programs'])->name('programs');
    Route::get('program/{slug}', [FrontendController::class, 'programDetails'])->name('program.details');
    Route::get('teachers', [FrontendController::class, 'teachers'])->name('teacher.index');
    Route::get('about', [FrontendController::class, 'about'])->name('about');
    Route::get('message-management', [FrontendController::class, 'messageManagement'])->name('message.management');
    Route::get('governing-body', [FrontendController::class, 'governingBody'])->name('governing.body');
    Route::get('teacher-panel', [FrontendController::class, 'teacherPanel'])->name('teacher.panel');
    Route::get('administrative-team', [FrontendController::class, 'administrativeTeam'])->name('administrative.team');
    Route::get('procedures-policies', [FrontendController::class, 'policies'])->name('procedure.policies');
    Route::get('facilities', [FrontendController::class, 'facilities'])->name('facilities');
    Route::get('gallery', [FrontendController::class, 'pageGallery'])->name('gallery');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('elements', [DashboardController::class, 'elements'])->name('dashboard.elements');
    // General
    Route::post('editor/image/upload', [DashboardController::class, 'imageUpload'])->name('editor.file.upload');

    Route::resource('slider', SliderController::class);
    Route::resource('promo', PromoController::class);
    Route::resource('page', PageController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('contact', ContactController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting/update', [SettingController::class, 'update'])->name('setting.update');


});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
