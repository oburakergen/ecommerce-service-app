<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\JsonResponse;

interface TransactionInterface
{
    public function create(int $subscriptionId, array $credentials): JsonResponse;
}