<?php

namespace Managers;



class UserManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($pseudo, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (pseudo, email, password, role) VALUES (?, ?, ?, 'ROLE_USER')");

        $stmt->execute([$pseudo, $email, $hash]);
    }

    public function login($email, $password)
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
