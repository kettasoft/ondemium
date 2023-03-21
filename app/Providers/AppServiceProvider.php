<?php

namespace App\Providers;

use App\Observers\BookingObserver;
use App\Observers\UserObserver;
use App\Observers\DeviceObserver;
use App\Observers\VerifyDeviceObserver;
use App\Observers\AgentObserver;
use Modules\Booking\Models\Booking;
use Modules\User\Models\User;
use Modules\Device\Models\Device;
use Modules\Token\Models\Agent;
use Modules\Device\Models\VerifyDevice;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Booking::observe(BookingObserver::class);
        User::observe(UserObserver::class);
        Device::observe(DeviceObserver::class);
        Agent::observe(AgentObserver::class);
        VerifyDevice::observe(VerifyDeviceObserver::class);
    }
}
