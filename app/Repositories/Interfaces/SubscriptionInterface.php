<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\JsonResponse;

interface SubscriptionInterface
{
    public function create(int $userId, array $credentials): JsonResponse;
    public function update(int $subscriptionId, array $credentials): JsonResponse;
    public function delete(int $subscriptionId): JsonResponse;
    public function show(int $userId): JsonResponse;
}
