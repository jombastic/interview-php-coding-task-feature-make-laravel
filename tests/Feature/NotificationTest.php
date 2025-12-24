<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    public static function channelDataProvider(): array
    {
        return [
            "slack" => ['slack', 'Sending notification via Slack'],
            'email' => ['email', 'Sending notification via email'],
        ];
    }

    #[DataProvider('channelDataProvider')]
    public function testNotification(string $channel, string $consoleOutput): void
    {
        Log::shouldReceive()->info($consoleOutput);

        $this->artisan(
            'app:send-notification',
            [
                '--channel' => $channel,
                '--message' => 'test message',
            ],
        )->assertExitCode(0);
    }
}
