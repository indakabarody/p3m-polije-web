<?php

use App\Http\Controllers\Guest\AboutController as  GuestAboutController;
use App\Http\Controllers\Guest\BlogCategoryController as GuestBlogCategoryController;
use App\Http\Controllers\Guest\BlogController as GuestBlogController;
use App\Http\Controllers\Guest\ContactController as GuestContactController;
use App\Http\Controllers\Guest\GalleryController as GuestGalleryController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\ServiceController as GuestServiceController;
use App\Http\Controllers\Guest\TeamController as GuestTeamController;
use App\Http\Controllers\Guest\VisionMissionController as GuestVisionMissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestHomeController::class, 'index'])->name('home');

Route::get('about', [GuestAboutController::class, 'index'])->name('about.index');

Route::get('vision-mission', [GuestVisionMissionController::class, 'index'])->name('vission-mission.index');

Route::get('team', [GuestTeamController::class, 'index'])->name('team.index');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [GuestServiceController::class, 'index'])->name('index');
    Route::get('/{slug}', [GuestServiceController::class, 'show'])->name('show');
});

Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [GuestBlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [GuestBlogController::class, 'show'])->name('show');
});

Route::prefix('blog-categories')->name('blog-categories.')->group(function () {
    Route::get('/{slug}', [GuestBlogCategoryController::class, 'show'])->name('show');
});

Route::prefix('galleries')->name('galleries.')->group(function () {
    Route::get('/', [GuestGalleryController::class, 'index'])->name('index');
    Route::get('/{slug}', [GuestGalleryController::class, 'show'])->name('show');
});

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [GuestContactController::class, 'index'])->name('index');
});
