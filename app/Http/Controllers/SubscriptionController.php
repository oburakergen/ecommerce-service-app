<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(protected SubscriptionRepository $subscriptionRepository) {}
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request, int $userId)
    {
        $credentials = $request->validated();

        return $this->subscriptionRepository->create($userId, $credentials);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $userId)
    {
        return $this->subscriptionRepository->show($userId);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $userId, int $subscriptionId)
    {
        $credentials = $request->validate([
            'renewed_at' => ['date'],
            'expired_at' => ['date'],
        ]);

        dd($credentials);

        return $this->subscriptionRepository->update($subscriptionId, $credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $subscriptionId)
    {
        return $this->subscriptionRepository->delete($subscriptionId);
    }
}
