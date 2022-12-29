<?php

namespace Modules\Doctor\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        \Modules\Doctor\Events\Registered::class => [
            \Modules\Doctor\Listeners\RegisterTheUserAgent::class
        ]
    ];
}