<?php

namespace Modules\Device\Events;

use Illuminate\Queue\SerializesModels;

class FlushExpiredCodeDeviceVerify
{
    use SerializesModels;

    public $verifyDevice;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($verifyDevice)
    {
        $this->verifyDevice = $verifyDevice;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
