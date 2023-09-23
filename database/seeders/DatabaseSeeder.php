<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @param Subscription $subscription
     * @return array
     * @throws \Exception
     */
    public function createTransaction(Subscription $subscription): array
    {
        try {
            $transaction = Transaction::factory(1)->create(
                [
                    'subscription_id' => $subscription->id,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $transaction->toArray();
    }

    /**
     * @param User $user
     * @return array
     * @throws \Exception
     */
    public function createSubscription(User $user): array
    {

        try {
            $subscription = Subscription::factory(1)->create(
                [
                    'user_id' => $user->id,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        $subscription->each(function ($subscription) {
            $this->createTransaction($subscription);
        });

        return $subscription->toArray();
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(10)->create();

        $user->each(function ($user) {
            $this->createSubscription($user);
        });
    }
}
