<?php

namespace Modules\Question\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Question\Events\DeactivateExpiredQuestions;
use Modules\Question\Events\QuestionExpired;
use Modules\Question\Listeners\CleanUpUserQuestions;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        QuestionExpired::class => [
            CleanUpUserQuestions::class,
        ]
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
