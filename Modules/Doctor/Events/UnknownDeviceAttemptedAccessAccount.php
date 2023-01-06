<?php

namespace Modules\Doctor\Events;

use Illuminate\Queue\SerializesModels;

class UnknownDeviceAttemptedAccessAccount
{
    use SerializesModels;

    public $doctor;

    public function __construct($doctor)
    {
        $this->doctor = $doctor;
    }
}
