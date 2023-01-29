<?php

namespace Modules\Question\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Question\Events\QuestionExpired;

class CleanUpUserQuestions
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
    public function handle(QuestionExpired $event)
    {
        $event->expireQuestions->map(fn($expireQuestion) => $expireQuestion->delete());
    }
}
