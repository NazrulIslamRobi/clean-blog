<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use App\Events\UserCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\PostCacheListener;
use App\Listeners\UserCreatedListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PostCreated::class => [
            PostCacheListener::class,
        ],
        PostUpdated::class => [
            PostCacheListener::class,
        ],
        PostDeleted::class => [
            PostCacheListener::class,
        ],
        UserCreated::class => [
            UserCreatedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
