<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \Modules\Post\Models\Post::class => \App\Policies\PostPolicy::class,
        \Modules\Clinic\Models\Clinic::class => \Modules\Clinic\Policies\ClinicPolicy::class,
        // \Modules\Comment\Models\Comment::class => \Modules\Comment\Policies\CommentPolicy::class,
        // \Modules\Question\Models\Answer::class => \Modules\Answer\Policies\AnswerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
