<?php

namespace App\Repositories;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionCollection;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Repositories\Interfaces\SubscriptionInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SubscriptionRepository implements SubscriptionInterface
{

    /**
     * @param int $userId
     * @param array $credentials
     * @return JsonResponse
     */
    public function create(int $userId, array $credentials): JsonResponse
    {
        try {
            $subscription = Subscription::create([
                "user_id" => $userId,
                ...$credentials
            ]);
        } catch (\Exception $exception) {
            throw new HttpResponseException(response()->error(['errors' => $exception->getMessage()], 404));
        }

        return response()->success(new SubscriptionResource($subscription), 201);
    }

    public function update(int $subscriptionId, array $credentials): JsonResponse
    {
        try {
            $subscriptionUpdatedId = Subscription::where('id', $subscriptionId)->update($credentials);
        } catch (\Exception $exception) {
            throw new HttpResponseException(response()->error(['errors' => $exception->getMessage()], 404));
        }

        try {
            $subscription = Subscription::where('id', $subscriptionUpdatedId)->firstOrFail();
        } catch (\Exception $exception) {
            throw new HttpResponseException(response()->error(['errors' => $exception->getMessage()], 404));
        }

        return response()->success(new SubscriptionResource($subscription), 200);
    }

    public function delete(int $subscriptionId): JsonResponse
    {
        try {
            Subscription::where('id', $subscriptionId)->delete();
            Transaction::where('subscription_id', $subscriptionId)->delete();
        } catch (\Exception $exception) {
            throw new HttpResponseException(response()->error(['errors' => $exception->getMessage()], 404));
        }

        return response()->success("Kayıt Başarıyla Silindi", 204);
    }

    public function show(int $userId): JsonResponse
    {
        try {
            $subscription = Subscription::where('user_id', $userId)->get();
        } catch (\Exception $exception) {
            throw new HttpResponseException(response()->error(['errors' => $exception->getMessage()], 404));
        }

        return response()->success(new SubscriptionCollection($subscription), 200);
    }
}
