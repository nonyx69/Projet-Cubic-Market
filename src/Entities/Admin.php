<?php

namespace Entities;

class Admin
{
    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $role;

    public function getId() { return $this->id; }
    public function getPseudo() { return $this->pseudo; }
    public function getEmail() { return $this->email; }
    public function getRole() { return $this->role; }

    public function setPseudo ($pseudo) { $this->pseudo = $pseudo; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setRole($role) { $this->role = $role; }
}
