<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Modules\Device\Events\FlushExpiredCodeDeviceVerify,
    Modules\Device\Listeners\DeleteAllExpiredCodeVerifyDevice;

use Modules\User\Events\Registered,
    Modules\User\Listeners\NewSystemDirectory,
    Modules\User\Listeners\AttachedThroughTheFreeDefaultPlanIfDoctor,
    Modules\User\Listeners\CreateAndAttachedThroughRegisteredDevice;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            NewSystemDirectory::class,
            // AttachedThroughTheFreeDefaultPlanIfDoctor::class,
            CreateAndAttachedThroughRegisteredDevice::class
        ],

        FlushExpiredCodeDeviceVerify::class => [
            DeleteAllExpiredCodeVerifyDevice::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
