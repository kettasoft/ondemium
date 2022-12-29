<?php

namespace Modules\Doctor\Events;

use Illuminate\Queue\SerializesModels;

class Registered
{
    use SerializesModels;

    public $doctor;
    public $useragent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($doctor, $useragent)
    {
        $this->doctor = $doctor;
        $this->useragent = $useragent;
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
