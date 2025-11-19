<?php

namespace App\Providers;

use App\View\Composers\GeneralComposer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Translatable\Facades\Translatable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (env('DEPLOY_MODE') === 'cpanel') {
            $this->app->usePublicPath(realpath(env('DEPLOY_PUBLIC_PATH')));
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle)
                ->middleware('web')
                ->prefix(LaravelLocalization::setLocale());
        });

        Translatable::fallback(
            fallbackLocale: 'id',
        );

        View::composer(['layouts.app', 'partials.footer', 'partials.navbar', 'contact'], GeneralComposer::class);
    }
}
