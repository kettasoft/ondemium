<?php

namespace App\Observers;

use Modules\Device\Models\Device;

class DeviceObserver
{
    /**
     * Handle the Device "created" event.
     *
     * @param  \Modules\Device\Models\Device  $experience
     * @return void
     */
    public function created(Device $device)
    {
        $device->verify()->create(['code' => rand(12345678, 87654321)]);
    }
}
