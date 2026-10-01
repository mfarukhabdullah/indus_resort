<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ContactSettingsController;
use App\Http\Controllers\FooterSettingsController;

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
    }
}
