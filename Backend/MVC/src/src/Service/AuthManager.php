<?php

namespace App\Service;

use App\Entity\Admin;
use Tightenco\Collect\Support\Collection;

class AuthManager
{
    /**
     * @var Collection|Admin[]
     */
    private $admins;

    public function __construct()
    {
        $admin = new Admin();
        $admin->setUsername('admin');
        $admin->setPassword($this->hash("123"));
        $this->admins = new Collection([$admin]);
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        foreach ($this->admins as $admin) {
            if ($username === $admin->getUsername()) {
                return password_verify($password, $admin->getPassword());
            }
        }
        return false;
    }

    public function hash($password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
