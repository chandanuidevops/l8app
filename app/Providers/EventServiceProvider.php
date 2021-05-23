<?php

namespace App\Providers;

use App\Listeners\SendMailListener;
use Illuminate\Support\Facades\Event;
use App\Events\NewUserRegisteredEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewUserRegisteredEvent::class=>[
            \App\Listeners\SendMailListener::class,
            \App\Listeners\CreateUserProfileListener::class,
            \App\Listeners\AssignUserRoleListener::class,
        ]
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
