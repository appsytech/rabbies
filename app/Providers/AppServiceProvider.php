<?php

namespace App\Providers;

use App\Repositories\Admin\AboutFeatureRepository;
use App\Repositories\Admin\AboutUsRepository;
use App\Repositories\Admin\ActivityRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\GalleryRepository;
use App\Repositories\Admin\HomeSliderRepository;
use App\Repositories\Admin\InquiryRepository;
use App\Repositories\Admin\Interfaces\AboutFeatureRepositoryInterface;
use App\Repositories\Admin\Interfaces\AboutUsRepositoryInterface;
use App\Repositories\Admin\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Admin\Interfaces\AdminRepositoryInterface;
use App\Repositories\Admin\Interfaces\GalleryRepositoryInterface;
use App\Repositories\Admin\Interfaces\HomeSliderRepositoryInterface;
use App\Repositories\Admin\Interfaces\InquiryRepositoryInterface;
use App\Repositories\Admin\Interfaces\PackageRepositoryInterface;
use App\Repositories\Admin\Interfaces\PublicationRepositoryInterface;
use App\Repositories\Admin\Interfaces\ServiceRepositoryInterface;
use App\Repositories\Admin\PackageRepository;
use App\Repositories\Admin\PublicationRepository;
use App\Repositories\Admin\ServiceRepository;
use App\Repositories\Web\AboutFeatureRepository as WebAboutFeatureRepository;
use App\Repositories\Web\AboutUsRepository as WebAboutUsRepository;
use App\Repositories\Web\ActivityRepository as WebActivityRepository;
use App\Repositories\Web\AdminRepository as WebAdminRepository;
use App\Repositories\Web\GalleryRepository as WebGalleryRepository;
use App\Repositories\Web\InquiryRepository as WebInquiryRepository;
use App\Repositories\Web\Interface\AboutFeatureRepositoryInterface as InterfaceAboutFeatureRepositoryInterface;
use App\Repositories\Web\Interface\AboutUsRepositoryInterface as InterfaceAboutUsRepositoryInterface;
use App\Repositories\Web\Interface\ActivityRepositoryInterface as InterfaceActivityRepositoryInterface;
use App\Repositories\Web\Interface\AdminRepositoryInterface as InterfaceAdminRepositoryInterface;
use App\Repositories\Web\Interface\GalleryRepositoryInterface as InterfaceGalleryRepositoryInterface;
use App\Repositories\Web\Interface\InquiryRepositoryInterface as InterfaceInquiryRepositoryInterface;
use App\Repositories\Web\Interface\PackageRepositoryInterface as InterfacePackageRepositoryInterface;
use App\Repositories\Web\Interface\PublicationRepositoryInterface as InterfacePublicationRepositoryInterface;
use App\Repositories\Web\Interface\ServiceRepositoryInterface as InterfaceServiceRepositoryInterface;
use App\Repositories\Web\PackageRepository as WebPackageRepository;
use App\Repositories\Web\PublicationRepository as WebPublicationRepository;
use App\Repositories\Web\ServiceRepository as WebServiceRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $bindings = [
            /* ============ Admins bindings ============ */
            ActivityRepositoryInterface::class => ActivityRepository::class,
            PackageRepositoryInterface::class => PackageRepository::class,
            AdminRepositoryInterface::class => AdminRepository::class,
            HomeSliderRepositoryInterface::class => HomeSliderRepository::class,
            PublicationRepositoryInterface::class => PublicationRepository::class,
            ServiceRepositoryInterface::class => ServiceRepository::class,
            AboutUsRepositoryInterface::class => AboutUsRepository::class,
            AboutFeatureRepositoryInterface::class => AboutFeatureRepository::class,
            GalleryRepositoryInterface::class => GalleryRepository::class,
            InquiryRepositoryInterface::class => InquiryRepository::class,

            /* ============ Web bindings ============ */
            InterfaceActivityRepositoryInterface::class => WebActivityRepository::class,
            InterfaceAdminRepositoryInterface::class => WebAdminRepository::class,
            InterfacePublicationRepositoryInterface::class => WebPublicationRepository::class,
            InterfaceServiceRepositoryInterface::class => WebServiceRepository::class,
            InterfaceAboutUsRepositoryInterface::class => WebAboutUsRepository::class,
            InterfaceAboutFeatureRepositoryInterface::class => WebAboutFeatureRepository::class,
            InterfaceGalleryRepositoryInterface::class => WebGalleryRepository::class,
            InterfaceInquiryRepositoryInterface::class => WebInquiryRepository::class,
            InterfacePackageRepositoryInterface::class => WebPackageRepository::class
        ];

        foreach ($bindings as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
