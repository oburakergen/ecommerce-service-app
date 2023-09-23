<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
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
