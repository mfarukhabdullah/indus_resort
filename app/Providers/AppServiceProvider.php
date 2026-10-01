<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ContactSettingsController;
use App\Http\Controllers\FooterSettingsController;
use App\Http\Controllers\SeoController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.footer', function ($view) {
            $view->with('contactSettings', (new ContactSettingsController)->settings());
            $view->with('footerSettings', (new FooterSettingsController)->settings());
        });
        View::composer(['home','about','rooms','gallery','contact'], function ($view) { $view->with('seo', (new SeoController)->settings()); });
    }
}
