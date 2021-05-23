<?php

namespace App\Listeners;

use App\Events\NewUserRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignUserRoleListener
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
     * @param  NewUserRegisteredEvent  $event
     * @return void
     */
    public function handle(NewUserRegisteredEvent $event)
    {
        $event->user->roles()->attach(4);
    }
}
