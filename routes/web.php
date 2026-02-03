<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PublicationController;
use Illuminate\Support\Facades\Route;

/* ======================Dashboard====================== */
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

/* ======================Dashboard > Auth ====================== */
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('login/proceed', [AuthController::class, 'authenticate'])->name('login.proceed');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/* ====================== Dashboard > Activity====================== */
Route::get('dashboard/activity', [ActivityController::class, 'index'])->name('activity.index')->middleware('auth');
Route::get('dashboard/activity/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit')->middleware('auth');
Route::put('dashboard/activity/update', [ActivityController::class, 'update'])->name('activity.update')->middleware('auth');
Route::post('dashboard/activity/store', [ActivityController::class, 'store'])->name('activity.store')->middleware('auth');
Route::delete('dashboard/activity/delete', [ActivityController::class, 'delete'])->name('activity.delete')->middleware('auth');
Route::post('dashboard/activity/status/update', [ActivityController::class, 'updateStatus'])->name('activity.status.update')->middleware('auth');

/* ====================== Dashboard > Package ====================== */
Route::get('dashboard/package', [PackageController::class, 'index'])->name('package.index')->middleware('auth');
Route::post('dashboard/package/store', [PackageController::class, 'store'])->name('package.store')->middleware('auth');
Route::delete('dashboard/package/delete', [PackageController::class, 'delete'])->name('package.delete')->middleware('auth');
Route::get('dashboard/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit')->middleware('auth');
Route::put('dashboard/package/update', [PackageController::class, 'update'])->name('package.update')->middleware('auth');

/* ====================== Dashboard > Admins ====================== */
Route::get('dashboard/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::post('dashboard/admin/store', [AdminController::class, 'store'])->name('admin.store')->middleware('auth');
Route::delete('dashboard/admin/delete', [AdminController::class, 'delete'])->name('admin.delete')->middleware('auth');
Route::get('dashboard/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware('auth');
Route::put('dashboard/admin/update', [AdminController::class, 'update'])->name('admin.update')->middleware('auth');
Route::post('dashboard/admin/status/update', [AdminController::class, 'updateStatus'])->name('admin.status.update')->middleware('auth');

/* ====================== Dashboard > Profile ====================== */
Route::get('dashboard/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::get('dashboard/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('dashboard/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

/* ====================== Dashboard > Homepage Slider ====================== */
Route::get('dashboard/homepage-slider', [HomeSliderController::class, 'index'])->name('homepage-slider.index')->middleware('auth');
Route::post('dashboard/homepage-slider/store', [HomeSliderController::class, 'store'])->name('homepage-slider.store')->middleware('auth');
Route::delete('dashboard/homepage-slider/delete', [HomeSliderController::class, 'delete'])->name('homepage-slider.delete')->middleware('auth');
Route::get('dashboard/homepage-slider/edit/{id}', [HomeSliderController::class, 'edit'])->name('homepage-slider.edit')->middleware('auth');
Route::put('dashboard/homepage-slider/update', [HomeSliderController::class, 'update'])->name('homepage-slider.update')->middleware('auth');
Route::post('dashboard/homepage-slider/status/update', [HomeSliderController::class, 'updateStatus'])->name('homepage-slider.status.update')->middleware('auth');

/* ====================== Dashboard > Publication ====================== */
Route::get('dashboard/publication', [PublicationController::class, 'index'])->name('publication.index')->middleware('auth');
Route::post('dashboard/publication/store', [PublicationController::class, 'store'])->name('publication.store')->middleware('auth');
Route::delete('dashboard/publication/delete', [PublicationController::class, 'delete'])->name('publication.delete')->middleware('auth');
Route::get('dashboard/publication/edit/{id}', [PublicationController::class, 'edit'])->name('publication.edit')->middleware('auth');
Route::put('dashboard/publication/update', [PublicationController::class, 'update'])->name('publication.update')->middleware('auth');
Route::post('dashboard/publication/status/update', [PublicationController::class, 'updateStatus'])->name('publication.status.update')->middleware('auth');
