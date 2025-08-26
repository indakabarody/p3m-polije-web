<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\AppSettingController as AdminAppSettingController;
use App\Http\Controllers\Admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ImportantLinkController as AdminImportantLinkController;
use App\Http\Controllers\Admin\PasswordController as AdminPasswordController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin', 'active'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/edit', [AdminProfileController::class, 'edit'])->name('edit');
        Route::put('/', [AdminProfileController::class, 'update'])->name('update');
    });

    Route::prefix('change-password')->name('change-password.')->group(function () {
        Route::get('/', [AdminPasswordController::class, 'index'])->name('index');
        Route::put('/', [AdminPasswordController::class, 'update'])->name('update');
    });

    Route::resource('/brands', AdminBrandController::class);

    Route::resource('/clients', AdminClientController::class);

    Route::resource('/services', AdminServiceController::class);

    Route::resource('/galleries', AdminGalleryController::class);

    Route::resource('/blogs', AdminBlogController::class);

    Route::resource('/blog-categories', AdminBlogCategoryController::class);

    Route::resource('/admins', AdminAdminController::class);

    Route::resource('/teams', AdminTeamController::class);

    Route::middleware('superadmin')->group(function () {
        Route::prefix('admins')->name('admins.')->group(function () {
            Route::get('{admin}/edit-password', [AdminAdminController::class, 'editPassword'])->name('edit-password');
            Route::put('{admin}/edit-password', [AdminAdminController::class, 'updatePassword'])->name('update-password');
        });
    });

    Route::prefix('app-settings')->name('app-settings.')->group(function () {
        Route::get('/', [AdminAppSettingController::class, 'index'])->name('index');
        Route::put('/', [AdminAppSettingController::class, 'update'])->name('update');
    });

    Route::resource('/important-links', AdminImportantLinkController::class);
});
