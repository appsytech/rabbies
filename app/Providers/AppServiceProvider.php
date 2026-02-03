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
use App\Repositories\Admin\PackageRepository;
use App\Repositories\Admin\PublicationRepository;
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
