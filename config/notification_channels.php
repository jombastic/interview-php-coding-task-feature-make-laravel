<?php

return [
    'channels' => [
        'slack' => App\Channels\SlackChannel::class,
        'email' => App\Channels\EmailChannel::class,
    ]
];
