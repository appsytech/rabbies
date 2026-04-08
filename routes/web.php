<?php

use App\Http\Controllers\Admin\AboutFeatureController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\LayoutConfigController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialMediaConfigController;
use App\Http\Controllers\Admin\TwoFactorController;
use App\Http\Controllers\Web\ActivityController as WebActivityController;
use App\Http\Controllers\Web\AdminController as WebAdminController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\web\InquiryController;
use App\Http\Controllers\Web\PackageController as WebPackageController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\PublicationController as WebPublicationController;
use App\Http\Controllers\Web\ServiceController as WebServiceController;
use Illuminate\Support\Facades\Route;





/* ====================== Google > Two Factor Authentication   ====================== */

Route::get('2fa/setup/{id}', [TwoFactorController::class, 'setup'])->name('google.2fa.setup');
Route::post('2fa/enable/{id}', [TwoFactorController::class, 'enableTwoFactor'])->name('google.2fa.enable')->middleware(['auth', '2fa.verified']);

Route::get('2fa/disable/setup/{id}', [TwoFactorController::class, 'showDisbaleSetup'])->name('google.2fa.disable.setup');
Route::post('2fa/disable/{id}', [TwoFactorController::class, 'disableTwoFactor'])->name('google.2fa.disable')->middleware(['auth', '2fa.verified']);


Route::get('2fa/verify', [TwoFactorController::class, 'showVerifyForm'])->name('google.2fa.verify.form');
Route::post('2fa/verify/proceeed', [TwoFactorController::class, 'verify'])->name('google.2fa.verify.proceed');

/* ====================== Website ====================== */

Route::get('/', [PageController::class, 'home'])->name('web.homepage');
Route::get('about-us', [PageController::class, 'aboutUs'])->name('web.about-us');
Route::get('contact', [PageController::class, 'contact'])->name('web.contact');


/* ====================== Web > Activity ====================== */
Route::get('/activities', [WebActivityController::class, 'index'])->name('web.activity.index');
Route::get('activity/details/{id}', [WebActivityController::class, 'show'])->name('web.activity.show');

/* ====================== Web > Admin ====================== */
Route::get('member/details/{id}', [WebAdminController::class, 'show'])->name('web.admin.show');


/* ====================== Web > Services ====================== */
Route::get('service/details/{id}', [WebServiceController::class, 'show'])->name('web.service.show');


/* ======================  Web > Blog ====================== */
Route::get('blog', [BlogController::class, 'index'])->name('web.blog.index');
Route::get('blog/details', [BlogController::class, 'show'])->name('web.blog.show');

/* ======================Web Routes > Inquiry====================== */
Route::post('inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');


/* ======================  Web > Publication ====================== */
Route::get('publication', [WebPublicationController::class, 'index'])->name('web.publication.index');
Route::get('publication/details/{id}', [WebPublicationController::class, 'show'])->name('web.publication.show');


/* ======================  Web > Package ====================== */
Route::get('package', [WebPackageController::class, 'index'])->name('web.package.index');
Route::get('package/details/{id}', [WebPackageController::class, 'show'])->name('web.package.show');


/* ======================Dashboard====================== */
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', '2fa.verified']);

/* ======================Dashboard > Auth ====================== */
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth', '2fa.verified']);
Route::post('login/proceed', [AuthController::class, 'authenticate'])->name('login.proceed');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth', '2fa.verified']);

/* ====================== Dashboard > Activity====================== */
Route::get('dashboard/activity', [ActivityController::class, 'index'])->name('activity.index')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/activity/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/activity/update', [ActivityController::class, 'update'])->name('activity.update')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/activity/store', [ActivityController::class, 'store'])->name('activity.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/activity/delete', [ActivityController::class, 'delete'])->name('activity.delete')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/activity/status/update', [ActivityController::class, 'updateStatus'])->name('activity.status.update')->middleware(['auth', '2fa.verified']);

/* ====================== Dashboard > Package ====================== */
Route::get('dashboard/package', [PackageController::class, 'index'])->name('package.index')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/package/store', [PackageController::class, 'store'])->name('package.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/package/delete', [PackageController::class, 'delete'])->name('package.delete')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/package/update', [PackageController::class, 'update'])->name('package.update')->middleware(['auth', '2fa.verified']);

/* ====================== Dashboard > Admins ====================== */
Route::get('dashboard/admin', [AdminController::class, 'index'])->name('admin.index')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/admin/store', [AdminController::class, 'store'])->name('admin.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/admin/delete', [AdminController::class, 'delete'])->name('admin.delete')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/admin/update', [AdminController::class, 'update'])->name('admin.update')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/admin/status/update', [AdminController::class, 'updateStatus'])->name('admin.status.update')->middleware(['auth', '2fa.verified']);

/* ====================== Dashboard > Profile ====================== */
Route::get('dashboard/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware(['auth', '2fa.verified']);

/* ====================== Dashboard > Homepage Slider ====================== */
Route::get('dashboard/homepage-slider', [HomeSliderController::class, 'index'])->name('homepage-slider.index')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/homepage-slider/store', [HomeSliderController::class, 'store'])->name('homepage-slider.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/homepage-slider/delete', [HomeSliderController::class, 'delete'])->name('homepage-slider.delete')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/homepage-slider/edit/{id}', [HomeSliderController::class, 'edit'])->name('homepage-slider.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/homepage-slider/update', [HomeSliderController::class, 'update'])->name('homepage-slider.update')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/homepage-slider/status/update', [HomeSliderController::class, 'updateStatus'])->name('homepage-slider.status.update')->middleware(['auth', '2fa.verified']);

/* ====================== Dashboard > Publication ====================== */
Route::get('dashboard/publication', [PublicationController::class, 'index'])->name('publication.index')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/publication/store', [PublicationController::class, 'store'])->name('publication.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/publication/delete', [PublicationController::class, 'delete'])->name('publication.delete')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/publication/edit/{id}', [PublicationController::class, 'edit'])->name('publication.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/publication/update', [PublicationController::class, 'update'])->name('publication.update')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/publication/status/update', [PublicationController::class, 'updateStatus'])->name('publication.status.update')->middleware(['auth', '2fa.verified']);


/* ====================== Dashboard > Service ====================== */
Route::get('dashboard/service', [ServiceController::class, 'index'])->name('service.index')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/service/store', [ServiceController::class, 'store'])->name('service.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/service/delete', [ServiceController::class, 'delete'])->name('service.delete')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/service/update', [ServiceController::class, 'update'])->name('service.update')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/service/status/update', [ServiceController::class, 'updateStatus'])->name('service.status.update')->middleware(['auth', '2fa.verified']);


/* ====================== Dashboard > About us ====================== */
Route::get('dashboard/about-us', [AboutUsController::class, 'index'])->name('about-us.index')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/about-us/edit/{id}', [AboutUsController::class, 'edit'])->name('about-us.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/about-us/update', [AboutUsController::class, 'update'])->name('about-us.update')->middleware(['auth', '2fa.verified']);


/* ====================== Dashboard > Social Media Config ====================== */
Route::get('dashboard/social-media-config', [SocialMediaConfigController::class, 'index'])->name('social-media-config.index')->middleware(['auth']);
Route::post('dashboard/social-media-config/store', [SocialMediaConfigController::class, 'store'])->name('social-media-config.store')->middleware(['auth']);
Route::delete('dashboard/social-media-config/delete', [SocialMediaConfigController::class, 'delete'])->name('social-media-config.delete')->middleware(['auth']);
Route::get('dashboard/social-media-config/edit/{id}', [SocialMediaConfigController::class, 'edit'])->name('social-media-config.edit')->middleware(['auth']);
Route::put('dashboard/social-media-config/update', [SocialMediaConfigController::class, 'update'])->name('social-media-config.update')->middleware(['auth']);
Route::post('dashboard/social-media-config/status/update', [SocialMediaConfigController::class, 'updateStatus'])->name('social-media-config.status.update')->middleware(['auth']);


/* ====================== Dashboard > Layout Config ====================== */
Route::get('dashboard/layout-config', [LayoutConfigController::class, 'index'])->name('layout-config.index')->middleware(['auth']);
Route::post('dashboard/layout-config/store', [LayoutConfigController::class, 'store'])->name('layout-config.store')->middleware(['auth']);
Route::delete('dashboard/layout-config/delete', [LayoutConfigController::class, 'delete'])->name('layout-config.delete')->middleware(['auth']);
Route::get('dashboard/layout-config/edit/{id}', [LayoutConfigController::class, 'edit'])->name('layout-config.edit')->middleware(['auth']);
Route::put('dashboard/layout-config/update', [LayoutConfigController::class, 'update'])->name('layout-config.update')->middleware(['auth']);
Route::post('dashboard/layout-config/status/update', [LayoutConfigController::class, 'updateStatus'])->name('layout-config.status.update')->middleware(['auth']);


/* ====================== Dashboard > About us feature ====================== */
Route::get('dashboard/about-feature', [AboutFeatureController::class, 'index'])->name('about-feature.index')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/about-feature/store', [AboutFeatureController::class, 'store'])->name('about-feature.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/about-feature/delete', [AboutFeatureController::class, 'delete'])->name('about-feature.delete')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/about-feature/edit/{id}', [AboutFeatureController::class, 'edit'])->name('about-feature.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/about-feature/update', [AboutFeatureController::class, 'update'])->name('about-feature.update')->middleware(['auth', '2fa.verified']);



/* ====================== Dashboard > Gallery Images====================== */
Route::get('dashboard/gallery', [GalleryController::class, 'index'])->name('gallery.index')->middleware(['auth', '2fa.verified']);
Route::get('dashboard/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit')->middleware(['auth', '2fa.verified']);
Route::put('dashboard/gallery/update', [GalleryController::class, 'update'])->name('gallery.update')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/gallery/store', [GalleryController::class, 'store'])->name('gallery.store')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/gallery/delete', [GalleryController::class, 'delete'])->name('gallery.delete')->middleware(['auth', '2fa.verified']);
Route::post('dashboard/gallery/status/update', [GalleryController::class, 'updateStatus'])->name('gallery.status.update')->middleware(['auth', '2fa.verified']);



/* ====================== Dashboard > Inquiries ====================== */
Route::get('dashboard/inquiries', [AdminInquiryController::class, 'index'])->name('inquiry.index')->middleware(['auth', '2fa.verified']);
Route::delete('dashboard/inquiry/delete', [AdminInquiryController::class, 'delete'])->name('inquiry.delete')->middleware(['auth', '2fa.verified']);
