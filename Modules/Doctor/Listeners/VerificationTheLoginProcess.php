<?php

namespace Modules\Doctor\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use foroco\BrowserDetection;
use Modules\Doctor\Events\UnknownDeviceAttemptedAccessAccount;
use Modules\Doctor\Emails\NotifyTheDoctorOfAttempt as Notify;
use Modules\Doctor\Models\Doctor;

class VerificationTheLoginProcess
{

    private const DEVICE_INFO = [
        'os_name',
        'os_version',
        'device_type',
        'browser_name',
        'browser_version',
    ];

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UnknownDeviceAttemptedAccessAccount $event)
    {
        $useragent = request()->header('User-Agent');
        $deviceInfo = (new BrowserDetection())->getAll($useragent);
        $data = \Arr::only($deviceInfo, self::DEVICE_INFO);
        $data['ip_address'] = request()->ip(); // Add a ip address to $data array
        
        // Send mail to doctor
        Mail::to($event->doctor->email)->send(new Notify($data));
    }
}
