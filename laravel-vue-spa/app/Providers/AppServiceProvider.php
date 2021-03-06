<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningUnitTests()) {
            Schema::defaultStringLength(191);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing') && class_exists(DuskServiceProvider::class)) {
            $this->app->register(DuskServiceProvider::class);
        }
        //Repositories
        $this->app->singleton(
            \App\Repositories\Users\usersRepositoryInterface::class,
            \App\Repositories\Users\usersRepository::class
        );
        //Translations
        $this->app->singleton(
            \App\Repositories\Translations\translationsRepositoryInterface::class,
            \App\Repositories\Translations\translationsRepository::class
        );
    }
}
