<?php

namespace App\Observers;

use Illuminate\Http\Request;
use Modules\Device\Models\VerifyDevice;

class VerifyDeviceObserver
{
    /**
     * Handle the VerifyDevice "created" event.
     *
     * @param  Modules\Device\Models\VerifyDevice  $user
     * @return void
     */
    public function created(VerifyDevice $verifyDevice)
    {
        // $verifyDevice->device->user()->notify();
    }

    /**
     * Handle the VerifyDevice "deleted" event.
     *
     * @param  \Modules\VerifyDevice\Models\VerifyDevice  $verifyDevice
     * @return void
     */
    public function deleted(VerifyDevice $verifyDevice)
    {
        if (! ($verifyDevice->created_at <= now()->subHours(1))) {
            $verifyDevice->device->update(['verified_at' => now(), 'status' => true]);
        }
    }
}
