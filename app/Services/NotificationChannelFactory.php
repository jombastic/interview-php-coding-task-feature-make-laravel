<?php

namespace App\Services;

use App\Contracts\NotificationChannelInterface;
use InvalidArgumentException;

class NotificationChannelFactory
{
    private $channels;

    public function __construct()
    {
        $this->channels = config('notification_channels.channels');
    }

    /**
     * Instantiate the appropriate channel based on the parameter
     *
     * @param string $channel
     * @return NotificationChannelInterface
     */
    public function create(string $channel): NotificationChannelInterface
    {
        if (!isset($this->channels[$channel])) {
            throw new InvalidArgumentException(
                "Notification channel does not exist: {$channel}"
            );
        }

        $className = $this->channels[$channel];
        return new $className();
    }
}
