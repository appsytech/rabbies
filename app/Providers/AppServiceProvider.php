<?php

namespace App\Providers;

use App\Repositories\Admin\ActivityRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\HomeSliderRepository;
use App\Repositories\Admin\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Admin\Interfaces\AdminRepositoryInterface;
use App\Repositories\Admin\Interfaces\HomeSliderRepositoryInterface;
use App\Repositories\Admin\Interfaces\PackageRepositoryInterface;
use App\Repositories\Admin\Interfaces\PublicationRepositoryInterface;
use App\Repositories\Admin\Interfaces\ServiceRepositoryInterface;
use App\Repositories\Admin\PackageRepository;
use App\Repositories\Admin\PublicationRepository;
use App\Repositories\Admin\ServiceRepository;
use App\Repositories\Web\ActivityRepository as WebActivityRepository;
use App\Repositories\Web\AdminRepository as WebAdminRepository;
use App\Repositories\Web\Interface\ActivityRepositoryInterface as InterfaceActivityRepositoryInterface;
use App\Repositories\Web\Interface\AdminRepositoryInterface as InterfaceAdminRepositoryInterface;
use App\Repositories\Web\Interface\PublicationRepositoryInterface as InterfacePublicationRepositoryInterface;
use App\Repositories\Web\PublicationRepository as WebPublicationRepository;
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

            /* ============ Web bindings ============ */
            InterfaceActivityRepositoryInterface::class => WebActivityRepository::class,
            InterfaceAdminRepositoryInterface::class => WebAdminRepository::class,
            InterfacePublicationRepositoryInterface::class => WebPublicationRepository::class

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
