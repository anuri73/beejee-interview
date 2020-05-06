<?php

namespace App\Service;

use App\Entity\Admin;
use Tightenco\Collect\Support\Collection;

class AuthManager
{
    private Collection $admins;

    public function __construct()
    {
        $admin = new Admin();
        $admin->username = 'admin';
        $admin->password = $this->hash("123");
        $this->admins = new Collection([$admin]);
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    function login(string $username, string $password): bool
    {
        foreach ($this->admins as $admin) {
            if ($username === $admin->username) {
                return password_verify($password, $admin->password);
            }
        }
        return false;
    }

    function hash($password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
