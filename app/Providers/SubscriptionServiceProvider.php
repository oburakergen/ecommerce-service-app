<?php

namespace App\Providers;

use App\Repositories\Interfaces\SubscriptionInterface;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            SubscriptionInterface::class,
            SubscriptionRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('success', function ($data, $message = null, $code = 200) {
            return Response::json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ], $code);
        });

        Response::macro('error', function ($message = null, $code = 422) {
            return Response::json([
                'success' => false,
                'message' => $message,
            ], $code);
        });
    }
}
