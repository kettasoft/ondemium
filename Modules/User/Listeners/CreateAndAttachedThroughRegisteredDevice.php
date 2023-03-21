<?php

namespace Modules\User\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAndAttachedThroughRegisteredDevice
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->devices()->create([
            'ip' => request()->ip(),
            'agent' => request()->header('User-Agent'),
            'verified_at' => now(),
            'last_login_at' => now(),
            'is_primary' => true,
            'status' => true,
        ]);
    }
}
