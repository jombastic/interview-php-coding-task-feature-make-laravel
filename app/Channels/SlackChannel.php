<?php

namespace App\Channels;

use App\Contracts\NotificationChannelInterface;
use App\Lib\SimpleSlackClient;
use Illuminate\Support\Facades\Log;

class SlackChannel implements NotificationChannelInterface
{
    public function send(string $message): void
    {
        Log::info('Sending notification via Slack');

        SimpleSlackClient::postMessage('admin-notifications', $message);
    }
}
