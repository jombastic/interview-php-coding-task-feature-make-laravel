<?php

namespace App\Patterns\Builder;

class UserProfile
{
    // Only construct via the builder
    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly ?string $bio,
        public readonly ?string $avatarUrl,
    ) {}

    // Static factory method - builder calls this
    public static function create(
        string $name,
        string $email,
        ?string $phone = null,
        ?string $bio = null,
        ?string $avatarUrl = null
    ): self {
        return new self($name, $email, $phone, $bio, $avatarUrl);
    }
}
