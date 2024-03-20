<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


use Illuminate\Support\Facades\Gate;

use App\Models\Customer;
use App\Models\Comment;

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

        Gate::define('edit-comment', function(Customer $cus ,Comment $comment){
            return $cus->id == $comment->customer_id;
        });

        // Gate::define('edit-comment', function(Customer $customer, Comment $comment) {
        //     return $customer->id === $comment->customer_id;
        // });

    }
}
