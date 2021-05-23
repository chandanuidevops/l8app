<?php

namespace App\Listeners;

use App\Models\UserProfile;
use App\Events\NewUserRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserProfileListener
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
        $userProfile = new UserProfile(['user_id'=>$event->user->id,'country_id'=>1,'city'=>'default','phone'=>'123456','photo'=>'profile/dummy.jpg']);
        $event->user->profile()->save($userProfile);
    }
}
