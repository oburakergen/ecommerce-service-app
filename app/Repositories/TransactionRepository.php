<?php

namespace App\Repositories;

use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class TransactionRepository implements TransactionInterface
{

    public function create(int $subscriptionId, array $credentials): JsonResponse
    {
        try {
            $transaction = Transaction::create([
                "subscription_id" => $subscriptionId,
                ...$credentials
            ]);
        } catch (\Exception $exception) {
            throw new HttpResponseException(response()->error(['errors' => $exception->getMessage()], 404));
        }

        return response()->success(new TransactionResource($transaction), 201);
    }
}