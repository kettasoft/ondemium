<?php

namespace Modules\Doctor\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyTheDoctorOfAttempt extends Mailable
{
    use Queueable, SerializesModels;

    // public $theme = 'ondemium.css';

    public $device;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($device)
    {
        $this->device = $device;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('doctor::mails.test', ['device' => $this->device]);
    }
}
