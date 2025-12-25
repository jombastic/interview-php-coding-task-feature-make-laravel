## 🧱 Builder Design Pattern — Explained

The **Builder pattern** is a **creational design pattern** that separates the construction of a complex object from its representation, allowing you to create different representations using the same construction process. It’s especially helpful when:

* You have a lot of parameters (especially optional ones).
* You want readable and maintainable object creation code (avoid huge constructors).
* You want to avoid inconsistent object state during construction. ([GeeksforGeeks][2])

---

## 🐘 Laravel / PHP Example

Imagine you’re building a **User Profile** object that has required and optional attributes:

### 📌 Step 1 — The Product Class

```php
<?php

class UserProfile
{
    private string $name;
    private string $email;
    private ?string $phone;
    private ?string $bio;
    private ?string $avatarUrl;

    // Only construct via the builder
    private function __construct(UserProfileBuilder $builder)
    {
        $this->name = $builder->getName();
        $this->email = $builder->getEmail();
        $this->phone = $builder->getPhone();
        $this->bio = $builder->getBio();
        $this->avatarUrl = $builder->getAvatarUrl();
    }

    // Example getters (no public setters = immutable)
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getPhone(): ?string { return $this->phone; }
    public function getBio(): ?string { return $this->bio; }
    public function getAvatarUrl(): ?string { return $this->avatarUrl; }
}
```

### 📌 Step 2 — The Builder Class

```php
<?php

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

    public function avatarUrl(string $url): self
    {
        $this->avatarUrl = $url;
        return $this;
    }

    public function build(): UserProfile
    {
        return new UserProfile($this);
    }

    // Getters for builder
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getPhone(): ?string { return $this->phone; }
    public function getBio(): ?string { return $this->bio; }
    public function getAvatarUrl(): ?string { return $this->avatarUrl; }
}
```

### 📌 Step 3 — Client Code Usage

```php
<?php

$profile = (new UserProfileBuilder("Alice Smith", "alice@example.com"))
    ->phone("+123456789")
    ->bio("Laravel developer and open-source enthusiast.")
    ->avatarUrl("https://example.com/avatar.png")
    ->build();

// Now $profile is a fully built, immutable object.
```

---

## ✨ Why This Is Useful

* **Clear construction logic:** You see which optional attributes are added.
* **No giant constructors:** Required fields are in the builder constructor; optional fields are builder methods.
* **Immutable result:** Once built, the object doesn’t change.
* **Cleaner client code:** You avoid too many parameters or confusing `null` placeholders.

---
