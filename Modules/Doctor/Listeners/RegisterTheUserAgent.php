<?php

namespace Modules\Doctor\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterTheUserAgent
{
    private const DEVICE_DATA = [
        'os_name',
        'os_version',
        'device_type',
        'browser_name',
        'browser_version',
    ];
    public function handle($event)
    {
        $useragent = $event->useragent['useragent'];
        $browser = (new \foroco\BrowserDetection())->getAll($useragent);
        $data = \Arr::only($browser, self::DEVICE_DATA);

        $data['ip_address'] = request()->ip();
        $data['doctor_id'] = $event->doctor->id;

        \Modules\Device\Models\Device::create($data);
    }
}
