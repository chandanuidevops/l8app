<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Model\Post;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('isAdmin',function($user){
        //     $roles= $user->roles->pluck('name')->toArray();
        //     return in_array('Admin',$roles);
        // });
        // Gate::define('isSubscriber',function($user){
        //     $roles= $user->roles->pluck('name')->toArray();
        //     return in_array('isSubscriber',$roles);
        // });
        Gate::define('isAllowed',function($user,$allowed){
            $allowed =explode(":",$allowed);
            $roles= $user->roles->pluck('name')->toArray();
            return array_intersect($allowed,$roles);
        });
        Gate::define('allow-edit','App\Gates\PostGate@allowedAction');
    }
}
