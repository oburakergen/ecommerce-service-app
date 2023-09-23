<?php

namespace App\Policies;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    /**
     * @param User $user
     * @param Subscription $subscription
     * @return bool
     */
    public function create(User $user)
    {
        return $user->id === 1;
    }
}
