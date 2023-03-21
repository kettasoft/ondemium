<?php

namespace Modules\User\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Plan\Models\Plan;

class AttachedThroughTheFreeDefaultPlanIfDoctor
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
        if ($event->type == 'doctor') {
            $plan = Plan::where('slug', 'free')->first();
            $event->user->plan()->attach($plan);
        }
    }
}
