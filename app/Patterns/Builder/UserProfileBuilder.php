<?php

namespace App\Patterns\Builder;

class UserProfileBuilder
{
    private string $name;
    private string $email;
    private ?string $phone = null;
    private ?string $bio = null;
    private ?string $avatarUrl = null;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function phone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function bio(string $bio): self
    {
        $this->bio = $bio;
        return $this;
    }
    public function avatarUrl(string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    public function build(): UserProfile
    {
        return UserProfile::create(
            name: $this->name,
            email: $this->email,
            phone: $this->phone,
            bio: $this->bio,
            avatarUrl: $this->avatarUrl
        );
    }
}
