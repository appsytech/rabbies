<?php

namespace App\Providers;

use App\Services\Web\SocialMediaConfigService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(
        SocialMediaConfigService $socialMediaConfigService,
    ): void {
        View::composer('web.layouts.main', function ($view) use (
            $socialMediaConfigService,
        ) {
            $socials = $socialMediaConfigService->getSocialMediaConfigs();

            $view->with([
                'socials' => $socials
            ]);
        });
    }
}
