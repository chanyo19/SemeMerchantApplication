<?php

namespace App\Providers;

use App\Repositories\Api\Appointment\ApiAppointmentRepository;
use App\Repositories\Api\Appointment\ApiAppointmentRepositoryInterface;
use App\Repositories\Api\Customer\ApiCustomerRepository;
use App\Repositories\Api\Customer\ApiCustomerRepositoryInterface;
use App\Repositories\Api\Merchant\ApiMerchantRepository;
use App\Repositories\Api\Merchant\ApiMerchantRepositoryInterface;
use App\Repositories\Appointment\AppointmentRepository;
use App\Repositories\Appointment\AppointmentRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Facility\FacilityRepository;
use App\Repositories\Facility\FacilityRepositoryInterface;
use App\Repositories\Message\MessageRepository;
use App\Repositories\Message\MessageRepositoryInterface;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Settings\Menu\MenuRepository;
use App\Repositories\Settings\Menu\MenuRepositoryInterface;
use App\Repositories\Staff\StaffRepository;
use App\Repositories\Staff\StaffRepositoryInterface;
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
        app()->bind(ApiAppointmentRepositoryInterface::class,ApiAppointmentRepository::class);
        app()->bind(AppointmentRepositoryInterface::class,AppointmentRepository::class);
        app()->bind(MessageRepositoryInterface::class,MessageRepository::class);
        app()->bind(StaffRepositoryInterface::class,StaffRepository::class);
        app()->bind(FacilityRepositoryInterface::class,FacilityRepository::class);
    }
}
