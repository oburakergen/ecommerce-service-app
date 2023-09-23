<?php

namespace App\Console\Commands;

use App\Jobs\UpdateSubscriptionJob;
use App\Models\Subscription;
use Illuminate\Console\Command;

class SubscriptionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Komut Başladı');

        $subscription = Subscription::active()->get();

        $subscription->each(function ($subscription) {
            UpdateSubscriptionJob::dispatch($subscription);
        });

        $this->info('Komut Tamamlandı');
    }
}
