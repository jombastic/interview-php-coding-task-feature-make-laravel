<?php

namespace App\Console\Commands;

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
    public function handle()
    {
        $channel = $this->option('channel');
        $message = $this->option('message');

        if ($channel === null || $message === null) {
            $this->error('Please provide both channel and message options');
            return;
        }

        $this->info("Sending notification to {$channel} with message: {$message}");

        $notificationService = new \App\Services\Notification_Service();
        $notificationService->send_notification($message, $channel);
    }
}
