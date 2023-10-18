<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\KebabShops;
use App\Policies\KebabShopsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\KebabShops' => 'App\Policies\KebabShopsPolicy',
        // 'App\Models\KebabProduct' => 'App\Policies\KebabProductPolicy',
        // 'App\Models\Reviews' => 'App\Policies\ReviewsPolicy',
        // 'App\Models\User' => 'App\Polic ies\UserPolicy',

        KebabShops::class => KebabShopsPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
