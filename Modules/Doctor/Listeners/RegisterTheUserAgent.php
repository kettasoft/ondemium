<?php

namespace Modules\Doctor\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterTheUserAgent
{
    public function handle($event)
    {
        $data = [
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
            'last_login' => \Carbon\Carbon::now()
        ];

        $event->doctor->device()->create($data);
    }
}
