<?php

namespace App\Console\Commands;

use App\Services\NotificationService;
use Illuminate\Console\Command;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification {--channel=} {--message=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(NotificationService $notificationService)
    {
        $channel = $this->option('channel');
        $message = $this->option('message');

        if ($channel === null || $message === null) {
            $this->fail('Please provide both channel and message options');
        }

        try {
            $this->info("Sending notification to {$channel} with message: {$message}");
            $notificationService->sendNotification($message, $channel);
            $this->info("Notification sent successfully!");
        } catch (\InvalidArgumentException $e) {
            $this->fail($e->getMessage());
        }
    }
}
