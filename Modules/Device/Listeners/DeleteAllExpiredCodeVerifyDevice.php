<?php

namespace Modules\Device\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Device\Models\VerifyDevice;
use Modules\Device\Events\FlushExpiredCodeDeviceVerify;

class DeleteAllExpiredCodeVerifyDevice
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
    public function handle(FlushExpiredCodeDeviceVerify $event)
    {
        $event->verifyDevice->map(function (VerifyDevice $code) {
            $code->delete();
        });
    }
}
