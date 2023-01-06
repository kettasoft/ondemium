<?php

namespace Modules\Doctor\Events;

use Illuminate\Queue\SerializesModels;

class Login
{
    use SerializesModels;

    public $doctor;

    public function __construct($doctor)
    {
        $this->doctor = $doctor;
    }
}
