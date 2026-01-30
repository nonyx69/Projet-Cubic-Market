<?php

namespace Managers;

use PDO;

class UserManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function register(string $pseudo, string $email, string $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (pseudo, email, password, role) VALUES (?, ?, ?, 'ROLE_USER')"
        );

        $stmt->execute([$pseudo, $email, $hash]);
    }

    public function login(string $email, string $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return null;
    }
}
