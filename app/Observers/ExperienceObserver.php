<?php

namespace App\Observers;

use Modules\Experience\Models\Experience;

class ExperienceObserver
{
    /**
     * Handle the Experience "created" event.
     *
     * @param  \Modules\Experience\Models\Experience  $experience
     * @return void
     */
    public function created(Experience $experience)
    {
        //
    }

    /**
     * Handle the Experience "updated" event.
     *
     * @param  \Modules\Experience\Models\Experience  $experience
     * @return void
     */
    public function updated(Experience $experience)
    {
        //
    }

    /**
     * Handle the Experience "deleted" event.
     *
     * @param  \Modules\Experience\Models\Experience  $experience
     * @return void
     */
    public function deleted(Experience $experience)
    {
        //
    }

    /**
     * Handle the Experience "restored" event.
     *
     * @param  \Modules\Experience\Models\Experience  $experience
     * @return void
     */
    public function restored(Experience $experience)
    {
        //
    }

    /**
     * Handle the Experience "force deleted" event.
     *
     * @param  \Modules\Experience\Models\Experience  $experience
     * @return void
     */
    public function forceDeleted(Experience $experience)
    {
        //
    }
}
