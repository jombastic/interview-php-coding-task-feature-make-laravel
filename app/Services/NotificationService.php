<?php

namespace App\Services;

class NotificationService
{
    public function __construct(
        private NotificationChannelFactory $notificationChannelFactory
    ) {}

    /**
     * Send notification to appropriate channel
     *
     * @param string $message
     * @param string $channel
     * @return void
     */
    public function sendNotification(string $message, string $channel): void {
        $channel = $this->notificationChannelFactory->create($channel);
        $channel->send($message);
    }
}
