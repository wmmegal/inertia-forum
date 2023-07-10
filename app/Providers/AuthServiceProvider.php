<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Discussion;
use App\Models\Topic;
use App\Policies\DiscussionPolicy;
use App\Policies\TopicPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Topic::class => TopicPolicy::class,
        Discussion::class => DiscussionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
