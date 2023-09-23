<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Subscription;
use App\Policies\SubscriptionPolicy;
use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Subscription::class => SubscriptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create', SubscriptionPolicy::class . '@create');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            AuthInterface::class,
            AuthRepository::class
        );
    }
}
