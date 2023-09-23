<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(protected SubscriptionRepository $subscriptionRepository) {}
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request, User $userId)
    {
        if (!$this->authorize('create', $userId)) {
            return response()->error(['errors' => 'Sadece örnek olması için subscription ekleme işlemlerinde userId kontrolü yapıldı. 1 nolu kullanıcı ile login olup deneyebilirsiniz.'], 403);
        }
        $credentials = $request->validated();

        return $this->subscriptionRepository->create($userId->id, $credentials);
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

        return $this->subscriptionRepository->update($subscriptionId, $credentials);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $credentials = $request->validate([
            'subscription_id' => ['required', 'integer'],
        ]);

        $subscriptionId = (int)$credentials['subscription_id'];

        return $this->subscriptionRepository->delete($subscriptionId);
    }
}
