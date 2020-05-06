<?php

namespace App\Entity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 * @ORM\Table(name="admin")
 */
class Admin
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    public int $id;
    /**
     * @ORM\Column(name="username", type="string", nullable=false)
     * @var string $username
     */
    public string $username;
    /**
     * @ORM\Column(name="password", type="string", nullable=false)
     * @var string $password
     */
    public string $password;
}
