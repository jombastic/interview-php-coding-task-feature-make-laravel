<?php

use App\Patterns\Builder\UserProfileBuilder;

$profile = (new UserProfileBuilder("Slavica Churulinova", "slavica@churulinova.com"))
    ->phone('0412 345 678')
    ->bio('Content write and editor at megantic')
    ->avatarUrl('https://example.com/avatar.png')
    ->build();
