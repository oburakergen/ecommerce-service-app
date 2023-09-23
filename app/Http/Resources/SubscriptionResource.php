<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'users' => [
                'name' => $this->user->name,
                'email'=> $this->user->email,
            ],
            'transaction' => [
                'price' => $this->transaction ? $this->transaction->price : null,
            ],
            'renewed_at' => $this->renewed_at,
            'expired_at' => $this->expired_at,
        ];
    }
}
