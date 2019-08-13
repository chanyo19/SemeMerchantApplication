<?php

namespace App\Providers;

use App\Repositories\Settings\Menu\MenuRepository;
use App\Repositories\Settings\Menu\MenuRepositoryInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(MenuRepositoryInterface::class,MenuRepository::class);
    }
}
