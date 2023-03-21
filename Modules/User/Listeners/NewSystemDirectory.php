<?php

namespace Modules\User\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use \File;

class NewSystemDirectory
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
    public function handle($event)
    {
        $path = public_path("storage/users/" . $event->user->username);
        
        if (File::makeDirectory(public_path("storage/users/{$event->user->username}"), 0777, true, true)) {
            foreach(config('user.directories') as $directories) {
                File::makeDirectory(public_path("storage/users/" . $event->user->username . '/' . $directories), 0777, true, true);
            }
        }
    }
}
