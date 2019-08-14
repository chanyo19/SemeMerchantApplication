<?php

namespace App\Providers;

use App\Repositories\Api\Customer\ApiCustomerRepository;
use App\Repositories\Api\Customer\ApiCustomerRepositoryInterface;
use App\Repositories\Api\Merchant\ApiMerchantRepository;
use App\Repositories\Api\Merchant\ApiMerchantRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Service\ServiceRepositoryInterface;
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
        app()->bind(CustomerRepositoryInterface::class,CustomerRepository::class);
        app()->bind(ApiCustomerRepositoryInterface::class,ApiCustomerRepository::class);
        app()->bind(ApiMerchantRepositoryInterface::class,ApiMerchantRepository::class);
        app()->bind(ServiceRepositoryInterface::class,ServiceRepository::class);
    }
}
