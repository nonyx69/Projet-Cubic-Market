<?php

namespace Entities;

class User
{
    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private string $role;

    public function getId(): int { return $this->id; }
    public function getPseudo(): string { return $this->pseudo; }
    public function getEmail(): string { return $this->email; }
    public function getRole(): string { return $this->role; }

    public function setPseudo(string $pseudo): void { $this->pseudo = $pseudo; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setPassword(string $password): void { $this->password = $password; }
    public function setRole(string $role): void { $this->role = $role; }
}
