<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('post-edit',function($user,$post)
        {
            if ($user->role_id == 1 || $user->role_id == 2 || $user->id == $post->user_id) {
                return true;
            }
        });
        Gate::define('comment-destroy',function($user)
        {
            if ($user->role_id == 1 || $user->role_id == 2) {
                return true ;
            }
        });
    }
}
