<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 * @ORM\Table(name="task")
 */
class Task
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
     * @ORM\Column(name="email", type="string", nullable=false)
     * @var string $email
     */
    public string $email;
    /**
     * @ORM\Column(name="task", type="text", nullable=false)
     * @var string $task
     */
    public string $task;
}
