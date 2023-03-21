<?php

namespace App\Observers;

use Modules\User\Models\User;
use Modules\User\Events\Registered;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  Modules\User\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        event(new Registered($user));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  Modules\User\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  Modules\User\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  Modules\User\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  Modules\User\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
