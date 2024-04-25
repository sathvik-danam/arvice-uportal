<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport as Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Model' => 'App\Policies\PostPolicy',
        //  \App\Models\Post::class => \App\Policies\PostPolicy::class,
    ];
    

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user){
            return $user->type === 'Admin';
        });

        Gate::define('isAuthor', function($user){
            return $user->type === 'Author';
        });

        Gate::define('isUser', function($user){
            return $user->type === 'User';
        });

        Log::debug("Before Passport routes");
        Passport::routes();
        Log::debug("After Passport routes");

        //
    }
}
