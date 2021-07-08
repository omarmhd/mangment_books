<?php

namespace App\Providers;

use App\Models\User;
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
    public $super_privileges=['Administrator'];
    public $high_privileges=['Administrator','BookstoreManager','DeptChairs'];
    public $low_privileges=['Student','Faculty'];
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('super_privileges', function ( $user) {
            return in_array($user->role,$this->super_privileges);
        });
        Gate::define('high_privileges', function ( $user) {
            return in_array($user->role,$this->high_privileges);
        });
        Gate::define('low_privileges', function ( $user) {
            return in_array($user->role,$this->low_privileges,true);
        });

    }
}
