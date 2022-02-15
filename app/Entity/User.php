<?php

namespace App\Library\Entity;

class User
{
    private string $email;
    private string $password;
    private ?string $permission;

    public function __construct(string $email, string $password, ?string $permission)
    {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_ARGON2I);
        $this->permission = $permission;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): void
    {
        $this->permission = $permission;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->getPassword());
    }
}