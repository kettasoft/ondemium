<?php

namespace App\Observers;

use Modules\Access\Models\Access;

class AccessObserver
{
    /**
     * Handle the Access "created" event.
     *
     * @param  \Modules\Access\Models\Access  $access
     * @return void
     */
    public function created(Access $access)
    {
        //
    }

    /**
     * Handle the Access "updated" event.
     *
     * @param  \Modules\Access\Models\Access  $access
     * @return void
     */
    public function updated(Access $access)
    {
        //
    }

    /**
     * Handle the Access "deleted" event.
     *
     * @param  \Modules\Access\Models\Access  $access
     * @return void
     */
    public function deleted(Access $access)
    {
        dd('dasdsa');
        $access->parent->currentAccessToken()->delete();
    }

    /**
     * Handle the Access "restored" event.
     *
     * @param  \Modules\Access\Models\Access  $access
     * @return void
     */
    public function restored(Access $access)
    {
        //
    }

    /**
     * Handle the Access "force deleted" event.
     *
     * @param  \Modules\Access\Models\Access  $access
     * @return void
     */
    public function forceDeleted(Access $access)
    {
        //
    }
}
