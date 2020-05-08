<?php

namespace App\Entity;

class Admin
{
    /**
     * @var null|string $username
     */
    private $username;
    /**
     * @var null|string $password
     */
    private $password;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return Admin
     */
    public function setUsername(?string $username): Admin
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return Admin
     */
    public function setPassword(?string $password): Admin
    {
        $this->password = $password;
        return $this;
    }
}
